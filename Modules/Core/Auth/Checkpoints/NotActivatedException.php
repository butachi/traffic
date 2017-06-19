<?php
namespace Modules\Core\Auth\Checkpoints;

use Modules\System\Entities\Users\UserInterface;
use RuntimeException;

class NotActivatedException extends RuntimeException
{
    /**
     * The user which caused the exception.
     *
     * @var \Modules\System\Entities\Users\UserInterface
     */
    protected $user;

    /**
     * Returns the user.
     *
     * @return \Modules\System\Entities\Users\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user associated with Sentinel (does not log in).
     *
     * @param  \Modules\System\Entities\Users\UserInterface
     * @return void
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
    }
}
