<?php namespace Modules\User\Repositories\Sentinel;

use Modules\Core\Auth\Checkpoints\NotActivatedException;
use Modules\Core\Auth\Checkpoints\ThrottlingException;
use Modules\Core\Contracts\Authentication as Authentication;
use Modules\Core\Facades\User;
use Modules\User\Events\UserHasActivatedAccount;

class SentinelAuthentication implements Authentication
{
    /**
     * Authenticate a user
     * @param  array $credentials
     * @param  bool  $remember    Remember the user
     * @return mixed
     */
    public function login(array $credentials, $remember = false)
    {
        try {
            if (User::authenticate($credentials, $remember)) {
                return false;
            }
            return 'Invalid login or password.';
        } catch (NotActivatedException $e) {
            return 'Account not yet validated. Please check your email.';
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();

            return "Your account is blocked for {$delay} second(s).";
        }
    }

    /**
     * Register a new user.
     * @param  array $user
     * @return bool
     */
    public function register(array $user)
    {
        return User::getUserRepository()->create((array) $user);
    }

    /**
     * Assign a role to the given user.
     * @param  \Modules\User\Repositories\UserRepository $user
     * @param  \Modules\User\Repositories\RoleRepository $role
     * @return mixed
     */
    public function assignRole($user, $role)
    {
        return $role->users()->attach($user);
    }

    /**
     * Log the user out of the application.
     * @return bool
     */
    public function logout()
    {
        return User::logout();
    }

    /**
     * Activate the given used id
     * @param  int    $userId
     * @param  string $code
     * @return mixed
     */
    public function activate($userId, $code)
    {
        $user = User::findById($userId);

        $success = Activation::complete($user, $code);
        if ($success) {
            event(new UserHasActivatedAccount($user));
        }

        return $success;
    }

    /**
     * Create an activation code for the given user
     * @param  \Modules\User\Repositories\UserRepository $user
     * @return mixed
     */
    public function createActivation($user)
    {
        return Activation::create($user)->code;
    }

    /**
     * Create a reminders code for the given user
     * @param  \Modules\User\Repositories\UserRepository $user
     * @return mixed
     */
    public function createReminderCode($user)
    {
        $reminder = Reminder::exists($user) ?: Reminder::create($user);

        return $reminder->code;
    }

    /**
     * Completes the reset password process
     * @param $user
     * @param  string $code
     * @param  string $password
     * @return bool
     */
    public function completeResetPassword($user, $code, $password)
    {
        return Reminder::complete($user, $code, $password);
    }

    /**
     * Determines if the current user has access to given permission
     * @param $permission
     * @return bool
     */
    public function hasAccess($permission)
    {
        return true;
        if (! User::check()) {
            return false;
        }

        return User::hasAccess($permission);
    }

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check()
    {
        return User::check();
    }

    /**
     * Get the ID for the currently authenticated user
     * @return int
     */
    public function id()
    {
        if (! $user = $this->check()) {
            return;
        }

        return $user->id;
    }
}