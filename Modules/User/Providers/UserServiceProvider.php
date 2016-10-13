<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @var array
     */
    protected $providers = [
        'Auth' => 'Modules\\Core\\Providers\\AuthServiceProvider',
    ];

    /**
     * @var array
     */
    protected $middleware = [
        'User' => [
            'auth.guest' => 'GuestMiddleware',
            'logged.in' => 'LoggedInMiddleware'
        ],
    ];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMiddleware($this->app['router']);
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->app->register(
            $this->getUserPackageServiceProvider()
        );

        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/user');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
                $sourcePath => $viewPath
            ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
                        return $path . '/modules/user';
                    }, \Config::get('view.paths')), [$sourcePath]), 'user');
    }

    private function registerBindings()
    {
        $driver = config('asgard.user.users.driver', 'Sentinel');

        $this->app->bind(
            'Modules\User\Repositories\UserRepository',
            "Modules\\User\\Repositories\\PChi\\PChiUserRepository"
        );

        $this->app->bind(
            'Modules\User\Repositories\RoleRepository',
            "Modules\\User\\Repositories\\PChi\\PChiRoleRepository"
        );
        $this->app->bind(
            'Modules\Core\Contracts\Authentication',
            "Modules\\User\\Repositories\\PChi\\PChiAuthentication"
        );
    }

    private function registerMiddleware($router)
    {
        foreach ($this->middleware as $module => $middlewares) {
            foreach ($middlewares as $name => $middleware) {
                $class = "Modules\\{$module}\\Http\\Middleware\\{$middleware}";

                $router->middleware($name, $class);
            }
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
                __DIR__.'/../Config/config.php' => config_path('user.php'),
            ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'user'
        );
    }

    private function getUserPackageServiceProvider()
    {
        $driver = config('user.driver', 'PChi');

        if (!isset($this->providers[$driver])) {
            throw new \Exception("Driver [{$driver}] does not exist");
        }

        return $this->providers[$driver];
    }
}
