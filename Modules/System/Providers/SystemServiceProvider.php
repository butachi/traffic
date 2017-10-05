<?php

namespace Modules\System\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\System\Entities\Profiles\EloquentProfile;
use Modules\System\Entities\Users\UserToken;
use Modules\System\Http\Middleware\AuthorisedApiToken;
use Modules\System\Http\Middleware\AuthorisedApiTokenAdmin;
use Modules\System\Http\Middleware\GuestMiddleware;
use Modules\System\Http\Middleware\TokenCan;
use Modules\System\Repositories\Eloquent\EloquentProfileRepository;
use Modules\System\Repositories\Eloquent\EloquentUserTokenRepository;
use Modules\System\Repositories\UserTokenRepository;
use Modules\User\Http\Middleware\LoggedInMiddleware;

class SystemServiceProvider extends ServiceProvider
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
        'Sentinel' => 'Modules\\Core\\Providers\\AuthServiceProvider',
    ];

    /**
     * @var array
     */
    protected $middleware = [
        'auth.guest' => GuestMiddleware::class,
        'logged.in' => LoggedInMiddleware::class,
        'api.token' => AuthorisedApiToken::class,
        'api.token.admin' => AuthorisedApiTokenAdmin::class,
        'token-can' => TokenCan::class
    ];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMiddleware();
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
        $viewPath = base_path('resources/views/modules/system');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
                $sourcePath => $viewPath
            ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
                        return $path . '/modules/system';
                    }, \Config::get('view.paths')), [$sourcePath]), 'system');
    }

    private function registerBindings()
    {
        $driver = config('system.driver');

        $this->app->bind(
            'Modules\System\Repositories\UserRepository',
            "Modules\\System\\Repositories\\{$driver}\\{$driver}UserRepository"
        );

        $this->app->bind(
            'Modules\System\Repositories\RoleRepository',
            "Modules\\System\\Repositories\\{$driver}\\{$driver}RoleRepository"
        );
        $this->app->bind(
            'Modules\Core\Contracts\Authentication',
            "Modules\\System\\Repositories\\{$driver}\\{$driver}Authentication"
        );

        $this->app->bind(
            'Modules\System\Repositories\ProfileRepository',
            function () {
                return new EloquentProfileRepository(new EloquentProfile());
            }
        );

        $this->app->bind(UserTokenRepository::class, function () {
                $repository = new EloquentUserTokenRepository(new UserToken());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheUserTokenDecorator($repository);
            });
    }

    private function registerMiddleware()
    {
        foreach ($this->middleware as $name => $class) {
            $this->app['router']->aliasMiddleware($name, $class);
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
                __DIR__.'/../Config/config.php' => config_path('system.php'),
            ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'system'
        );
    }

    private function getUserPackageServiceProvider()
    {
        $driver = config('system.driver');

        if (!isset($this->providers[$driver])) {
            throw new \Exception("Driver [{$driver}] does not exist");
        }

        return $this->providers[$driver];
    }
}
