<?php

namespace Modules\Catalog\Events;

class CategoryWasCreated
{
    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }
}
