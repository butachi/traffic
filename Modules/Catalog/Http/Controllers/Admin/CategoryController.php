<?php

namespace Modules\Catalog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Catalog\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $category;
    
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->getTreeForCategory();
        return view('catalog::admin.category.index', compact(
                'categories'
            ));
    }
}
