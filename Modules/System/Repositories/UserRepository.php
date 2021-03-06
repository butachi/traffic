<?php namespace Modules\System\Repositories;

/**
 * Interface UserRepository
 * @package Modules\System\Repositories
 */
interface UserRepository
{
    /**
     * Returns all the users
     * @return object
     */
    public function all();

    public function paginate($itmePerPage);
    /**
     * Create a user resource
     * @param  array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Create a user and assign roles to it
     * @param array $data
     * @param array $roles
     * @param bool $activated
     */
    public function createWithRoles($data, $roles, $activated = false);

    /**
     * Find a user by its ID
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Update a user
     * @param $user
     * @param $data
     * @return mixed
     */
    public function update($user, $data);

    /**
     * Update a user and sync its roles
     * @param  int   $userId
     * @param $data
     * @param $roles
     * @return mixed
     */
    public function updateAndSyncRoles($userId, $data, $roles);

    /**
     * Deletes a user
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Find a user by its credentials
     * @param  array $credentials
     * @return mixed
     */
    public function findByCredentials(array $credentials);
}
