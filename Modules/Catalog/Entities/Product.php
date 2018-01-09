<?php namespace Modules\Catalog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class Product extends Model {
    use Translatable, NestableTrait;

    protected $fillable = [
        'icon_image',
        'parent_id',
        'sort_order',
        'status'
    ];

    public $translatedAttributes = ['title', 'description'];
    protected $table = 'tbl_category';
    protected $primaryKey = 'id';

} 