<?php

namespace Modules\System\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;
use Modules\System\Entities\Users\UserInterface;

final class UserIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    /**
     * @var UserInterface
     */
    private $user;

    public function __construct(UserInterface $user, array $data)
    {
        $this->user = $user;
        parent::__construct($data);
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
