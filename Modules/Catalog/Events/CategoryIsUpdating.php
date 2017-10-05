<?php

namespace Modules\Catalog\Events;

use Modules\Catalog\Entities\Category;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class CategoryIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category, $attributes)
    {
        parent::__construct($attributes);
        $this->menuItem = $category;
    }

    /**
     * @return Menuitem
     */
    public function getCategory()
    {
        return $this->category;
    }
}
