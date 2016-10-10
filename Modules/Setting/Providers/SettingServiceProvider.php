<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;



    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();

        $this->app['setting.settings'] = $this->app->share(function ($app) {
                return new Settings($app[SettingRepository::class]);
            });

        $this->app->booting(function () {
                $loader = AliasLoader::getInstance();
                $loader->alias('Settings', SettingsFacade::class);
            });
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

    private function registerBindings()
    {
        $this->app->bind(SettingRepository::class, function () {
                $repository = new EloquentSettingRepository(new Setting());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheSettingDecorator($repository);
            });
        $this->app->bind(
            \Modules\Core\Contracts\Setting::class,
            Settings::class
        );
    }
}
