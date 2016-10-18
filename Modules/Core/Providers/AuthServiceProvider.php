<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Authentication\Authentication;
use Modules\Core\Authentication\Hashing\NativeHasher;
use Modules\Core\Authentication\Users\IlluminateUserRepository;

class AuthServiceProvider extends ServiceProvider{
    public function boot()
    {

    }

    public function register()
    {
        //$this->registerPersistences();
        $this->registerUsers();
        $this->registerRoles();
        //$this->registerCheckpoints();
        //$this->registerReminders();
        $this->registerSentinel();
        //$this->setUserResolver();
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

    public function registerSentinel()
    {
        $this->app->singleton('authentication', function( $app ) {
            $auth = new Authentication(
                $app['auth.users'],
                $app['auth.roles'],
                $app['auth.profile'],
                $app['events']
            );
            return $auth;
        });
    }
} 