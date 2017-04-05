<?php namespace Modules\System\Events;

class UserHasRegistered
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}
