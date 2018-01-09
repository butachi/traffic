<?php

namespace Modules\Catalog\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Catalog\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $product;
    
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        dd(123);
        return view('catalog::admin.category.index', compact(
                'categories'
            ));
    }
}
