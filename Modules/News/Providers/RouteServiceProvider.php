<?php namespace Modules\News\Providers;

use Modules\Core\Providers\RouteServiceProvider as CoreRouteServiceProvider;

class RouteServiceProvider extends CoreRouteServiceProvider {

    protected $namespace = 'Modules\News\Http\Controllers';
    /**
     * @return string
     */
    protected function getFrontendRoute()
    {
        return __DIR__ . '/../Http/frontendRoutes.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        return __DIR__ . '/../Http/backendRoutes.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return false;
    }
}