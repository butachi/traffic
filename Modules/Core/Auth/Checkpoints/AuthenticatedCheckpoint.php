<?php

namespace Modules\Core\Auth\Checkpoints;

use Modules\Core\Auth\Users\UserInterface;

trait AuthenticatedCheckpoint
{
    /**
     * {@inheritDoc}
     */
    public function fail(UserInterface $user = null)
    {
    }
}
