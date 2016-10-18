<?php
namespace Modules\Core\Authentication\Checkpoints;

use Modules\Core\Authentication\Users\UserInterface;
use RuntimeException;

class NotActivatedException extends RuntimeException
{
    /**
     * The user which caused the exception.
     *
     * @var \Modules\Core\Authentication\Users\UserInterface
     */
    protected $user;

    /**
     * Returns the user.
     *
     * @return \Modules\Core\Authentication\Users\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user associated with Sentinel (does not log in).
     *
     * @param  \Modules\Core\Authentication\Users\UserInterface
     * @return void
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
    }
}
