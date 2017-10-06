<?php

namespace Modules\Core\Auth\Activations;

use Modules\System\Entities\Users\UserInterface;

interface ActivationRepositoryInterface
{
    /**
     * Create a new activation record and code.
     *
     * @param  \Modules\System\Entities\Users\UserInterface  $user
     * @return \Modules\Core\Auth\Activations\ActivationInterface
     */
    public function create(UserInterface $user);

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Modules\System\Entities\Users\UserInterface  $user
     * @param  string  $code
     * @return \Modules\Core\Auth\Activations\ActivationInterface|bool
     */
    public function exists(UserInterface $user, $code = null);

    /**
     * Completes the activation for the given user.
     *
     * @param  \Modules\System\Entities\Users\UserInterface  $user
     * @param  string  $code
     * @return bool
     */
    public function complete(UserInterface $user, $code);

    /**
     * Checks if a valid activation has been completed.
     *
     * @param  \Modules\System\Entities\Users\UserInterface  $user
     * @return \Modules\Core\Auth\Activations\ActivationInterface|bool
     */
    public function completed(UserInterface $user);

    /**
     * Remove an existing activation (deactivate).
     *
     * @param  \Modules\System\Entities\Users\UserInterface  $user
     * @return bool|null
     */
    public function remove(UserInterface $user);

    /**
     * Remove expired activation codes.
     *
     * @return int
     */
    public function removeExpired();
}
