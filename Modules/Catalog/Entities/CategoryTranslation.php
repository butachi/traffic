<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $fillable = ['title', 'description', 'meta_title', 'meta_description', 'meta_keyword'];
    protected $table = 'tbl_category_translations';
}
