<?php namespace Modules\Catalog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use Translatable;

    protected $fillable = [

    ];


    public $translatedAttributes = ['title', 'status'];
    protected $table = 'tbl_category';

    public $translatedAttributes = ['title', 'status'];
    protected $table = 'tbl_category';
} 