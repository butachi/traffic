<?php

namespace Modules\Catalog\Events;

use Modules\Catalog\Entities\Category;

class MenuItemWasUpdated
{
    /**
     * @var Category
     */
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}
