<?php

namespace Modules\System\Events;

class UserWasCreated
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}
