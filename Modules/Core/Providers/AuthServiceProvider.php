<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Auth\Authentication;
use Modules\Core\Auth\Cookies\IlluminateCookie;
use Modules\Core\Auth\Hashing\NativeHasher;
use Modules\Core\Auth\Persistences\IlluminatePersistenceRepository;
use Modules\Core\Auth\Roles\IlluminateRoleRepository;
use Modules\Core\Auth\Sessions\IlluminateSession;
use Modules\Core\Auth\Users\IlluminateUserRepository;

class AuthServiceProvider extends ServiceProvider{
    public function boot()
    {

    }

    public function register()
    {
        $this->registerPersistences();
        $this->registerUsers();
        $this->registerRoles();
        //$this->registerCheckpoints();
        //$this->registerReminders();
        $this->registerAuthentication();
        //$this->setUserResolver();
    }

    /**
     * Registers the persistences.
     *
     * @return void
     */
    protected function registerPersistences()
    {
        $this->registerSession();
        $this->registerCookie();

        $this->app->singleton('auth.persistence', function ($app) {
                $config = $app['config']->get('core');

                $model  = array_get($config, 'persistences.model');
                $single = array_get($config, 'persistences.single');
                $users  = array_get($config, 'users.model');

                if (class_exists($users) && method_exists($users, 'setPersistencesModel')) {
                    forward_static_call_array([$users, 'setPersistencesModel'], [$model]);
                }

                return new IlluminatePersistenceRepository($app['auth.session'], $app['auth.cookie'], $model, $single);
            });
    }

    /**
     * Registers the session.
     *
     * @return void
     */
    protected function registerSession()
    {
        $this->app->singleton('auth.session', function ($app) {
                $key = $app['config']->get('core.session');

                return new IlluminateSession($app['session.store'], $key);
            });
    }

    /**
     * Registers the cookie.
     *
     * @return void
     */
    protected function registerCookie()
    {
        $this->app->singleton('auth.cookie', function ($app) {
                $key = $app['config']->get('core.cookie');

                return new IlluminateCookie($app['request'], $app['cookie'], $key);
            });
    }

    public function registerUsers()
    {
        $this->registerHasher();

        $this->app->singleton('auth.users', function ($app) {
                $config = $app['config']->get('core');

                $users        = array_get($config, 'users.model');
                $roles        = array_get($config, 'roles.model');
                $permissions  = array_get($config, 'permissions.class');

                if (class_exists($roles) && method_exists($roles, 'setUsersModel')) {
                    forward_static_call_array([$roles, 'setUsersModel'], [$users]);
                }

                if (class_exists($users) && method_exists($users, 'setPermissionsClass')) {
                    forward_static_call_array([$users, 'setPermissionsClass'], [$permissions]);
                }

                return new IlluminateUserRepository($app['auth.hasher'], $app['events'], $users);
            });
    }
    /**
     * Registers the hahser.
     *
     * @return void
     */
    protected function registerHasher()
    {
        $this->app->singleton('auth.hasher', function () {
                return new NativeHasher;
            });
    }

    /**
     * Registers the roles.
     *
     * @return void
     */
    protected function registerRoles()
    {
        $this->app->singleton('auth.roles', function ($app) {
                $config = $app['config']->get('core');

                $model = array_get($config, 'roles.model');
                $users = array_get($config, 'users.model');

                if (class_exists($users) && method_exists($users, 'setRolesModel')) {
                    forward_static_call_array([$users, 'setRolesModel'], [$model]);
                }

                return new IlluminateRoleRepository($model);
            });
    }

    public function registerAuthentication()
    {
        $this->app->singleton('authentication', function( $app ) {
            $auth = new Authentication(
                $app['auth.persistence'],
                $app['auth.users'],
                $app['auth.roles'],
                $app['events']
            );
            return $auth;
        });
    }
} 