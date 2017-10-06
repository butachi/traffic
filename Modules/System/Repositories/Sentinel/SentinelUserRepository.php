<?php namespace Modules\System\Repositories\Sentinel;

use Modules\Core\Facades\Activation;
use Modules\Core\Facades\Sentinel;
use Illuminate\Support\Facades\Hash;
use Modules\System\Events\UserHasRegistered;
use Modules\System\Events\UserIsCreating;
use Modules\System\Events\UserWasCreated;
use Modules\System\Events\UserWasUpdated;
use Modules\System\Exceptions\UserNotFoundException;
use Modules\System\Repositories\UserRepository;

class SentinelUserRepository implements UserRepository
{
    /**
     * @var \Modules\System\Entities\Users\EloquentUser
     */
    protected $user;
    /**
     * @var \Modules\System\Entities\Roles\EloquentRole
     */
    protected $role;

    public function __construct()
    {
        $this->user = Sentinel::getUserRepository()->createModel();
        $this->role = Sentinel::getRoleRepository()->createModel();
    }

    /**
     * Returns all the users
     * @return object
     */
    public function all()
    {
        return $this->user->all();
    }

    public function paginate($perPage)
    {
        return $this->user->paginate($perPage);
    }

    /**
     * Create a user resource
     * @param array $data
     * @param bool $activated
     * @return mixed
     */
    public function create(array $data, $activated = false)
    {
        $this->hashPassword($data);

        event($event = new UserIsCreating($data));
        $user = $this->user->create((array) $data);

        if ($activated) {
            $this->activateUser($user);
            event(new UserWasCreated($user));
        } else {
            event(new UserHasRegistered($user));
        }

        app(\Modules\System\Repositories\UserTokenRepository::class)->generateFor($user->id);

        return $user;
    }

    /**
     * Create a user and assign roles to it
     * @param  array $data
     * @param  array $roles
     * @param bool $activated
     * @return User
     */
    public function createWithRoles($data, $roles, $activated = false)
    {
        $user = $this->create((array) $data, $activated);

        if ($roles) {
            $user->roles()->attach($roles);
        }

        return $user;
    }

    /**
     * Find a user by its ID
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->user->find($id);
    }

    /**
     * Update a user
     * @param $user
     * @param $data
     * @return mixed
     */
    public function update($user, $data)
    {
        $user = $user->update($data);

        event(new UserWasUpdated($user));

        return $user;
    }

    /**
     * @param $userId
     * @param $data
     * @param $roles
     * @internal param $user
     * @return mixed
     */
    public function updateAndSyncRoles($userId, $data, $roles)
    {
        $user = $this->user->find($userId);

        $this->checkForNewPassword($data);

        $user = $user->fill($data);
        $user->save();

        event(new UserWasUpdated($user));

        if (!empty($roles)) {
            $user->roles()->sync($roles);
        }
    }

    /**
     * Deletes a user
     * @param $id
     * @throws UserNotFoundException
     * @return mixed
     */
    public function delete($id)
    {
        if ($user = $this->user->find($id)) {
            return $user->delete();
        };

        throw new UserNotFoundException();
    }

    /**
     * Find a user by its credentials
     * @param  array $credentials
     * @return mixed
     */
    public function findByCredentials(array $credentials)
    {
        return Sentinel::findByCredentials($credentials);
    }

    /**
     * Hash the password key
     * @param array $data
     */
    private function hashPassword(array &$data)
    {
        $data['password'] = Hash::make($data['password']);
    }

    /**
     * Check if there is a new password given
     * If not, unset the password field
     * @param array $data
     */
    private function checkForNewPassword(array &$data)
    {
        if (! $data['password']) {
            unset($data['password']);

            return;
        }

        $data['password'] = Hash::make($data['password']);
    }

    /**
     * Activate a user automatically
     *
     * @param $user
     */
    private function activateUser($user)
    {
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);
    }
}
