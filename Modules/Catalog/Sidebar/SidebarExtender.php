<?php namespace Modules\Catalog\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender1 implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('catalog::users.title.users'), function (Item $item) {
                $item->weight(0);
                $item->icon('fa fa-tags fw');
                $item->authorize(
                    $this->auth->hasAccess('catalog.users.index')
                    or $this->auth->hasAccess('catalog.roles.index')
                );

                $item->item(trans('catalog::users.title.users'), function (Item $item) {
                    $item->weight(0);
                    $item->icon('fa fa-user');
                    $item->route('admin.catalog.user.index');
                    $item->authorize(
                        $this->auth->hasAccess('user.users.index')
                    );
                });

                $item->item(trans('catalog::roles.title.roles'), function (Item $item) {
                    $item->weight(1);
                    $item->icon('fa fa-flag-o');
                    $item->route('admin.catalog.role.index');
                    $item->authorize(
                        $this->auth->hasAccess('catalog.roles.index')
                    );
                });
            });

        });

        return $menu;

    }
}
