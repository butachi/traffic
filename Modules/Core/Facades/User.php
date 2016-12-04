<?php

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;

class User extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'authentication';
    }
}
