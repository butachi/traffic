<?php namespace Modules\Core\Authentication\Users;

use Closure;

interface UserRepositoryInterface {
    /**
     * Finds a user by the given primary key.
     *
     * @param  int  $id
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function findById($id);

    /**
     * Finds a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function findByCredentials(array $credentials);

    /**
     * Finds a user by the given persistence code.
     *
     * @param  string  $code
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function findByPersistenceCode($code);

    /**
     * Records a login for the given user.
     *
     * @param UserInterface $user
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function recordLogin(UserInterface $user);

    /**
     * Records a logout for the given user.
     *
     * @param  \Modules\Core\Authentication\Users\UserInterface  $user
     * @return \Modules\Core\Authentication\Users\UserInterface|bool
     */
    public function recordLogout(UserInterface $user);

    /**
     * Validate the password of the given user.
     *
     * @param  \Modules\Core\Authentication\Users\UserInterface  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials);

    /**
     * Validate if the given user is valid for creation.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validForCreation(array $credentials);

    /**
     * Validate if the given user is valid for updating.
     *
     * @param  \Modules\Core\Authentication\Users\UserInterface|int  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validForUpdate($user, array $credentials);

    /**
     * Creates a user.
     *
     * @param  array $credentials
     * @param Closure $callback
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function create(array $credentials, Closure $callback = null);

    /**
     * Updates a user.
     *
     * @param  \Modules\Core\Authentication\Users\UserInterface|int  $user
     * @param  array  $credentials
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function update($user, array $credentials);
} 