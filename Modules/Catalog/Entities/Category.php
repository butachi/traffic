<?php namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    public $translatedAttributes = ['title', 'status'];
    protected $table = 'tbl_category';
} 