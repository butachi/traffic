<?php namespace Modules\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\Menuitem;
use Modules\Menu\Repositories\Cache\CacheMenuDecorator;
use Modules\Menu\Repositories\Cache\CacheMenuItemDecorator;
use Modules\Menu\Repositories\Eloquent\EloquentMenuItemRepository;
use Modules\Menu\Repositories\Eloquent\EloquentMenuRepository;
use Nwidart\Menus\MenuBuilder as Builder;
use Nwidart\Menus\MenuFacade;
use Nwidart\Menus\MenuItem as NwidartMenuItem;

class MenuServiceProvider extends ServiceProvider
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
    }

    /**
     * Register all online menus on the Pingpong/Menu package
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->registerMenus();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
                __DIR__.'/../Config/config.php' => config_path('menu.php'),
            ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'menu'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/menu');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
                $sourcePath => $viewPath
            ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
                        return $path . '/modules/menu';
                    }, \Config::get('view.paths')), [$sourcePath]), 'menu');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/menu');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'menu');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'menu');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    /**
     * Register class binding
     */
    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Menu\Repositories\MenuRepository',
            function () {
                $repository = new EloquentMenuRepository(new Menu());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheMenuDecorator($repository);
            }
        );

        $this->app->bind(
            'Modules\Menu\Repositories\MenuItemRepository',
            function () {
                $repository = new EloquentMenuItemRepository(new Menuitem());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheMenuItemDecorator($repository);
            }
        );
    }

    /**
     * Add a menu item to the menu
     * @param Menuitem $item
     * @param Builder $menu
     */
    public function addItemToMenu(Menuitem $item, Builder $menu)
    {
        if ($this->hasChildren($item)) {
            $this->addChildrenToMenu($item->title, $item->items, $menu, ['icon' => $item->icon]);
        } else {
            $target = $item->uri ?: $item->url;
            $menu->url(
                $target,
                $item->title,
                ['target' => $item->target,
                    'icon' => $item->icon]
            );
        }
    }

    /**
     * Add children to menu under the give name
     *
     * @param string $name
     * @param object $children
     * @param Builder|MenuItem $menu
     * @param array $attribs
     */
    private function addChildrenToMenu($name, $children, $menu, $attribs = [])
    {
        $menu->dropdown($name, function (NwidartMenuItem $subMenu) use ($children) {
            foreach ($children as $child) {
                $this->addSubItemToMenu($child, $subMenu);
            }
        }, 0, $attribs);
    }

    /**
     * Add children to the given menu recursively
     * @param Menuitem $child
     * @param \Nwidart\Menus\MenuItem $sub
     */
    private function addSubItemToMenu(Menuitem $child, NwidartMenuItem $sub)
    {
        $sub->url($child->uri, $child->title);

        if ($this->hasChildren($child)) {
            $this->addChildrenToMenu($child->title, $child->items, $sub);
        } else {
            $sub->url($child->url_target, $child->title, 0, ['icon' => $child->icon]);
        }
    }

    /**
     * Check if the given menu item has children
     *
     * @param  object $item
     * @return bool
     */
    private function hasChildren($item)
    {
        return $item->items->count() > 0;
    }

    /**
     * Register the active menus
     */
    private function registerMenus()
    {
        $menu = $this->app->make('Modules\Menu\Repositories\MenuRepository');
        $menuItem = $this->app->make('Modules\Menu\Repositories\MenuItemRepository');
        foreach ($menu->allOnline() as $menu) {
            $menuTree = $menuItem->getTreeForMenu($menu->id);
            MenuFacade::create($menu->name, function (Builder $menu) use ($menuTree) {
                foreach ($menuTree as $menuItem) {
                    $this->addItemToMenu($menuItem, $menu);
                }
            });
        }
    }
}
