<?php namespace Modules\System\Events;

class UserWasUpdated
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}
