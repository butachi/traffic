<?php namespace Modules\Catalog\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('catalog::workshop.title'), function (Group $group) {
            $group->item(trans('catalog::catalog.title'), function (Item $item) {
                $item->weight(0);
                $item->icon('fa fa-tags fw');
                $item->authorize(
                    $this->auth->hasAccess('catalog.category.index')
                    or $this->auth->hasAccess('catalog.product.index')
                );
                $item->item(trans('catalog::category.title.categories'), function (Item $item) {
                    $item->weight(0);
                    $item->icon('');
                    $item->route('admin.catalog.category.index');
                    $item->authorize(
                        $this->auth->hasAccess('catalog.category.index')
                    );
                });

                $item->item(trans('catalog::product.title.products'), function (Item $item) {
                    $item->weight(1);
                    $item->icon('');
                    $item->route('admin.catalog.product.index');
                    $item->authorize(
                        $this->auth->hasAccess('catalog.product.index')
                    );
                });
            });

        });
        return $menu;
    }
}
