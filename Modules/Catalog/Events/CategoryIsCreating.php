<?php

namespace Modules\Catalog\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class CategoryCreating extends AbstractEntityHook implements EntityIsChanging
{
}
