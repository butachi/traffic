<?php

namespace Modules\Core\Providers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class CoreServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The filters base class name.
     *
     * @var array
     */
    protected $middleware = [
        'Core' => [
            'permissions'           => 'PermissionMiddleware',
            'auth.admin'            => 'AdminMiddleware',
            'localizationRedirect'  => 'LocalizationMiddleware',
        ],
    ];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig('core', 'config');
        $this->publishConfig('core', 'setting');
        $this->registerViews();

        $this->registerMiddleware($this->app['router']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('beputi.onBackend', function () {
            return $this->onBackend();
        });
    }

    /**
     * Register the filters.
     *
     * @param  Router $router
     * @return void
     */
    public function registerMiddleware(Router $router)
    {
        foreach ($this->middleware as $module => $middlewares) {
            foreach ($middlewares as $name => $middleware) {
                $class = "Modules\\{$module}\\Http\\Middleware\\{$middleware}";
                $router->aliasMiddleware($name, $class);
            }
        }
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/core');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/core';
        }, \Config::get('view.paths')), [$sourcePath]), 'core');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/core');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'core');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'core');
        }
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
     * Checks if the current url matches the configured backend uri
     * @return bool
     */
    private function onBackend()
    {
        $url = app(Request::class)->url();
        if (str_contains($url, config('beputi.core.config.admin-prefix'))) {
            return true;
        }

        return false;
    }
}
