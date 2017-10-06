<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Auth\Activations\IlluminateActivationRepository;
use Modules\Core\Auth\Authentication;
use Modules\Core\Auth\Checkpoints\ActivationCheckpoint;
use Modules\Core\Auth\Cookies\IlluminateCookie;
use Modules\Core\Auth\Hashing\NativeHasher;
use Modules\Core\Auth\Persistences\IlluminatePersistenceRepository;
use Modules\System\Entities\Roles\IlluminateRoleRepository;
use Modules\Core\Auth\Sessions\IlluminateSession;
use Modules\System\Entities\Users\IlluminateUserRepository;

class AuthServiceProvider extends ServiceProvider{

    public function boot()
    {}


    public function register()
    {
        $this->registerPersistences();
        $this->registerUsers();
        $this->registerRoles();
        $this->registerCheckpoints();
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
                $config = $app['config']->get('beputi.core.setting');
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
                $key = $app['config']->get('beputi.core.setting.session');

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
                $key = $app['config']->get('beputi.core.setting.cookie');

                return new IlluminateCookie($app['request'], $app['cookie'], $key);
            });
    }

    public function registerUsers()
    {
        $this->registerHasher();

        $this->app->singleton('auth.users', function ($app) {
                $config = $app['config']->get('beputi.core.setting');

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
                $config = $app['config']->get('beputi.core.setting');
                $model = array_get($config, 'roles.model');
                $users = array_get($config, 'users.model');

                if (class_exists($users) && method_exists($users, 'setRolesModel')) {
                    forward_static_call_array([$users, 'setRolesModel'], [$model]);
                }

                return new IlluminateRoleRepository($model);
            });
    }

    /**
     * Registers the checkpoints.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    protected function registerCheckpoints()
    {
        $this->registerActivationCheckpoint();

        $this->app->singleton('auth.checkpoints', function ($app) {
                $activeCheckpoints = $app['config']->get('beputi.core.setting.checkpoints');

                $checkpoints = [];

                foreach ($activeCheckpoints as $checkpoint) {
                    if (! $app->offsetExists("sentinel.checkpoint.{$checkpoint}")) {
                        throw new InvalidArgumentException("Invalid checkpoint [$checkpoint] given.");
                    }

                    $checkpoints[$checkpoint] = $app["sentinel.checkpoint.{$checkpoint}"];
                }

                return $checkpoints;
            });
    }

    /**
     * Registers the activation checkpoint.
     *
     * @return void
     */
    protected function registerActivationCheckpoint()
    {
        $this->registerActivations();

        $this->app->singleton('auth.checkpoint.activation', function ($app) {
                return new ActivationCheckpoint($app['auth.activations']);
            });
    }

    /**
     * Registers the activations.
     *
     * @return void
     */
    protected function registerActivations()
    {
        $this->app->singleton('auth.activations', function ($app) {
                $config = $app['config']->get('beputi.core.setting.activations');
                return new IlluminateActivationRepository($config['model'], $config['expires']);
            });
    }

    public function registerAuthentication()
    {
        $this->app->singleton('auth', function( $app ) {
            $auth = new Authentication(
                $app['auth.persistence'],
                $app['auth.users'],
                $app['auth.roles'],
                $app['events']
            );
            return $auth;
        });
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'auth.session',
            'auth.cookie',
            'auth.persistence',
            'auth.hasher',
            'auth.users',
            'auth.roles',
            'auth.activations',
            'auth.checkpoint.activation',
            'auth.throttling',
            'auth.checkpoint.throttle',
            'auth.checkpoints',
            'auth.reminders',
            'auth',
        ];
    }
} 