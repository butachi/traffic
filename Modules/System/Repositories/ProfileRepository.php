<?php namespace Modules\System\Repositories;

/**
 * Interface RoleRepository
 * @package Modules\System\Repositories
 */
interface ProfileRepository
{
    /**
     * @param $item
     * @return mixed
     */
    public function paginate($item);
}
