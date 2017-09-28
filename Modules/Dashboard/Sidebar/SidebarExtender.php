<?php namespace Modules\Dashboard\Sidebar;

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
        $menu->group(trans('dashboard'), function (Group $group) {
            $group->item(trans('dashboard::dashboard.title'), function (Item $item) {
                $item->weight(0);
                $item->icon('fa fa-dashboard fw');
                $item->route('dashboard.index');
                $item->authorize(
                    $this->auth->hasAccess('dashboard.index')
                );
            });

        });

        return $menu;
    }
}
