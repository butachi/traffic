<?php

/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    2.0.7
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Modules\Core\Auth\Permissions;

trait PermissionsTrait
{
    /**
     * The permissions.
     *
     * @var array
     */
    protected $permissions = [];

    /**
     * An array of cached, prepared permissions.
     *
     * @var array
     */
    protected $preparedPermissions;

    /**
     * Create a new permissions instance.
     *
     * @param  array $permissions
     * @return \Modules\Core\Auth\Permissions\PermissionsTrait
     */
    public function __construct(array $permissions = null)
    {
        if (isset($permissions)) {
            $this->permissions = $permissions;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function hasAccess($permissions)
    {
        if (is_string($permissions)) {
            $permissions = func_get_args();
        }

        $prepared = $this->getPreparedPermissions();

        foreach ($permissions as $permission) {
            if (! $this->checkPermission($prepared, $permission)) {
                return false;
            }
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function hasAnyAccess($permissions)
    {
        if (is_string($permissions)) {
            $permissions = func_get_args();
        }

        $prepared = $this->getPreparedPermissions();

        foreach ($permissions as $permission) {
            if ($this->checkPermission($prepared, $permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns the secondary permissions.
     *
     * @return array
     */
    public function getSecondaryPermissions()
    {
        return $this->secondaryPermissions;
    }

    /**
     * Sets secondary permissions.
     *
     * @param  array  $secondaryPermissions
     * @return void
     */
    public function setSecondaryPermissions(array $secondaryPermissions)
    {
        $this->secondaryPermissions = $secondaryPermissions;

        $this->preparedPermissions = null;
    }

    /**
     * Lazily grab the prepared permissions.
     *
     * @return array
     */
    protected function getPreparedPermissions()
    {
        if ($this->preparedPermissions === null) {
            $this->preparedPermissions = $this->createPreparedPermissions();
        }

        return $this->preparedPermissions;
    }

    /**
     * Does the heavy lifting of preparing permissions.
     *
     * @param  array  $prepared
     * @param  array  $permissions
     * @return void
     */
    protected function preparePermissions(array &$prepared, array $permissions)
    {
        foreach ($permissions as $keys => $value) {
            foreach ($this->extractClassPermissions($keys) as $key) {
                // If the value is not in the array, we're opting in
                if (! array_key_exists($key, $prepared)) {
                    $prepared[$key] = $value;

                    continue;
                }

                // If our value is in the array and equals false, it will override
                if ($value === false) {
                    $prepared[$key] = $value;
                }
            }
        }
    }

    /**
     * Takes the given permission key and inspects it for a class & method. If
     * it exists, methods may be comma-separated, e.g. Class@method1,method2.
     *
     * @param  string  $key
     * @return array
     */
    protected function extractClassPermissions($key)
    {
        if (! str_contains($key, '@')) {
            return (array) $key;
        }

        $keys = [];

        list($class, $methods) = explode('@', $key);

        foreach (explode(',', $methods) as $method) {
            $keys[] = "{$class}@{$method}";
        }

        return $keys;
    }

    /**
     * Checks a permission in the prepared array, including wildcard checks and permissions.
     *
     * @param  array  $prepared
     * @param  string  $permission
     * @return bool
     */
    protected function checkPermission(array $prepared, $permission)
    {
        if (array_key_exists($permission, $prepared) && $prepared[$permission] === 0) {
            return true;
        }
        foreach ($prepared as $key => $value) {
            if ((str_is($permission, $key) || str_is($key, $permission)) && $value === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns the prepared permissions.
     *
     * @return void
     */
    abstract protected function createPreparedPermissions();
}
