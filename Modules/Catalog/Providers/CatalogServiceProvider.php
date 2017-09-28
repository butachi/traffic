<?php

namespace Modules\Catalog\Providers;

use Illuminate\Support\ServiceProvider;

class CatalogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('catalog.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'catalog'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/catalog');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/catalog';
        }, \Config::get('view.paths')), [$sourcePath]), 'catalog');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/catalog');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'catalog');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'catalog');
        }
    }

    public function registerBindings()
    {
        $this->app->bind(
            'Modules\Catalog\Repositories\CategoryRepository',
            function () {
                $repository = new EloquentCategoryRepository(new Menu());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheMenuDecorator($repository);
            }
        );
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
}
