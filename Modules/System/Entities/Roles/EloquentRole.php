<?php
namespace Modules\System\Entities\Roles;

use Modules\Core\Auth\Permissions\PermissibleInterface;
use Modules\Core\Auth\Permissions\PermissibleTrait;
use Illuminate\Database\Eloquent\Model;

class EloquentRole extends Model implements RoleInterface, PermissibleInterface
{
    use PermissibleTrait;

    protected $primaryKey = 'role_id';

    public $incrementing = false;
    /**
     * {@inheritDoc}
     */
    protected $table = 'tbl_role';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'name',
        'slug',
        'permissions',
    ];

    /**
     * The Eloquent users model name.
     *
     * @var string
     */
    protected static $usersModel = 'Modules\System\Entities\Users\EloquentUser';

    /**
     * The Eloquent profiles model name
     *
     * @var string
     */
    protected static $profileModel = 'Modules\System\Entities\Profiles\EloquentProfile';

    /**
     * The Users relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(static::$usersModel, 'tbl_user2role', 'role_id', 'user_id');
    }

    public function profiles()
    {
        return $this->belongsToMany(static::$profileModel, 'tbl_role2profile', 'role_id', 'profile_id');
    }

    /**
     * {@inheritDoc}
     */
    public function getRoleId()
    {
        return $this->getKey();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoleSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritDoc}
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * {@inheritDoc}
     */
    public static function getUsersModel()
    {
        return static::$usersModel;
    }

    /**
     * {@inheritDoc}
     */
    public static function setUsersModel($usersModel)
    {
        static::$usersModel = $usersModel;
    }

    /**
     * Dynamically pass missing methods to the permissions.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $methods = ['hasAccess', 'hasAnyAccess'];

        if (in_array($method, $methods)) {
            $permissions = $this->getPermissionsInstance();

            return call_user_func_array([$permissions, $method], $parameters);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * {@inheritDoc}
     */
    protected function createPermissions()
    {
        return new static::$permissionsClass($this->permissions);
    }
}
