<?php

namespace Modules\Catalog\Repositories\Eloquent;

use Modules\Catalog\Repositories\ProductRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Catalog\Events\CategoryIsCreating;
use Modules\Catalog\Events\CategoryIsUpdating;
use Modules\Catalog\Events\CategoryWasCreated;
use Modules\Catalog\Events\CategoryWasUpdated;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
{
    public function create($data)
    {
        event($event = new CategoryIsCreating($data));
        $menuItem = $this->model->create($event->getAttributes());

        event(new CategoryWasCreated($menuItem));

        return $menuItem;
    }

    public function update($menuItem, $data)
    {
        event($event = new CategoryIsUpdating($menuItem, $data));
        $menuItem->update($event->getAttributes());

        event(new CategoryWasUpdated($menuItem));

        return $menuItem;
    }
}
