<?php

namespace Modules\Core\Auth\Checkpoints;

use Modules\System\Entities\Users\UserInterface;

trait AuthenticatedCheckpoint
{
    /**
     * {@inheritDoc}
     */
    public function fail(UserInterface $user = null)
    {
    }
}
