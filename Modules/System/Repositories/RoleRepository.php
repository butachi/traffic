<?php namespace Modules\System\Repositories;

/**
 * Interface RoleRepository
 * @package Modules\System\Repositories
 */
interface RoleRepository
{
    /**
     * Return all the roles
     * @return mixed
     */
    public function all();

    /**
     * Create a role resource
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * Find a role by its id
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Update a role
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * Delete a role
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Find a role by its name
     * @param  string $name
     * @return mixed
     */
    public function findByName($name);
}
