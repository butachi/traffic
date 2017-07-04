<?php namespace Modules\System\Sidebar;

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
        $menu->group(trans('system'), function (Group $group) {
            $group->item(trans('system::system.title.system'), function (Item $item) {
                $item->weight(0);
                $item->icon('fa fa-cog fw');
                $item->authorize(
                    $this->auth->hasAccess('system.users.index') or $this->auth->hasAccess('system.role.index')
                );
                $item->item(trans('system::system.title.user management'), function (Item $item) {
                    $item->weight(1);
                    $item->icon('');
                    $item->authorize(
                        $this->auth->hasAccess('system.user.index')
                    );
                    $item->item(trans('system::users.title.users'), function (Item $item) {
                            $item->weight(1);
                            $item->icon('');
                            $item->route('admin.system.user.index');
                            $item->authorize(
                                $this->auth->hasAccess('system.user.index')
                            );
                        });
                    $item->item(trans('system::roles.title.roles'), function (Item $item) {
                            $item->weight(2);
                            $item->icon('');
                            $item->route('admin.system.role.index');
                            $item->authorize(
                                $this->auth->hasAccess('system.role.index')
                            );
                        });
                    $item->item(trans('system::profiles.title.profiles'), function (Item $item) {
                            $item->weight(3);
                            $item->icon('');
                            $item->route('admin.system.profile.index');
                            $item->authorize(
                                $this->auth->hasAccess('system.profile.index')
                            );
                        });
                });
            });

        });

        return $menu;
    }
}
