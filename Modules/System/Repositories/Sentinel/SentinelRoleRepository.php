<?php namespace Modules\System\Repositories\Sentinel;

use Modules\Core\Facades\User;
use Modules\System\Events\RoleWasUpdated;
use Modules\System\Repositories\RoleRepository;

class SentinelRoleRepository implements RoleRepository
{
    /**
     * @var \Modules\Core\Auth\Roles\EloquentRole
     */
    protected $role;

    public function __construct()
    {
        $this->role = User::getRoleRepository()->createModel();
    }

    /**
     * Return all the roles
     * @return mixed
     */
    public function all()
    {
        return $this->role->all();
    }

    /**
     * Create a role resource
     * @return mixed
     */
    public function create($data)
    {
        $this->role->create($data);
    }

    /**
     * Find a role by its id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->role->find($id);
    }

    /**
     * Update a role
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $role = $this->role->find($id);

        $role->fill($data);

        $role->save();

        event(new RoleWasUpdated($role));
    }

    /**
     * Delete a role
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $role = $this->role->find($id);

        return $role->delete();
    }

    /**
     * Find a role by its name
     * @param  string $name
     * @return mixed
     */
    public function findByName($name)
    {
        return User::findRoleByName($name);
    }
}