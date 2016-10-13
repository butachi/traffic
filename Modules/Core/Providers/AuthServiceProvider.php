<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    public function boot()
    {

    }

    public function register()
    {
        $this->registerPersistences();
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

        $this->app->singleton('sentinel.persistence', function ($app) {
                $config = $app['config']->get('cartalyst.sentinel');

                $model  = array_get($config, 'persistences.model');
                $single = array_get($config, 'persistences.single');
                $users  = array_get($config, 'users.model');

                if (class_exists($users) && method_exists($users, 'setPersistencesModel')) {
                    forward_static_call_array([$users, 'setPersistencesModel'], [$model]);
                }

                return new IlluminatePersistenceRepository($app['sentinel.session'], $app['sentinel.cookie'], $model, $single);
            });
    }

    /**
     * Registers the session.
     *
     * @return void
     */
    protected function registerSession()
    {
        $this->app->singleton('sentinel.session', function ($app) {
                $key = $app['config']->get('cartalyst.sentinel.session');

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
        $this->app->singleton('sentinel.cookie', function ($app) {
                $key = $app['config']->get('cartalyst.sentinel.cookie');

                return new IlluminateCookie($app['request'], $app['cookie'], $key);
            });
    }
    /**
     * Garbage collect activations and reminders.
     *
     * @return void
     */
    protected function garbageCollect()
    {
        $config = $this->app['config']->get('core.activations.lottery');

        $this->sweep($this->app['pChi.activations'], $config);

        $config = $this->app['config']->get('core.reminders.lottery');

        $this->sweep($this->app['pChi.reminders'], $config);
    }
} 