<?php

namespace Modules\Core\Auth\Permissions;

interface PermissibleInterface
{
    /**
     * Returns the permissions instance.
     *
     * @return \Modules\Core\Auth\Permissions\PermissionsInterface
     */
    public function getPermissionsInstance();

    /**
     * Adds a permission.
     *
     * @param  string  $permission
     * @param  bool  $value
     * @return \Modules\Core\Auth\Permissions\PermissibleInterface
     */
    public function addPermission($permission, $value = true);

    /**
     * Updates a permission.
     *
     * @param  string  $permission
     * @param  bool  $value
     * @param  bool  $create
     * @return \Modules\Core\Auth\Permissions\PermissibleInterface
     */
    public function updatePermission($permission, $value = true, $create = false);

    /**
     * Removes a permission.
     *
     * @param  string  $permission
     * @return \Modules\Core\Auth\Permissions\PermissibleInterface
     */
    public function removePermission($permission);
}
