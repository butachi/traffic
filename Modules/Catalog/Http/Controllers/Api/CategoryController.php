<?php

namespace Modules\Catalog\Http\Controllers\Api;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\Catalog\Repositories\CategoryRepository;
use Modules\Catalog\Repositories\MenuItemRepository;

class CategoryController extends Controller
{
    /**
     * @var Repository
     */
    private $cache;
    /**
     * @var MenuItemRepository
     */
    private $category;

    public function __construct(Repository $cache, CategoryRepository $category)
    {
        $this->cache = $cache;
        $this->category = $category;
    }

    /**
     * Update all menu items
     * @param Request $request
     */
    public function update(Request $request)
    {
        $this->cache->tags('categories')->flush();
    }

    /**
     * Delete a menu item
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        $category = $this->category->find($request->get('category'));

        if (! $category) {
            return Response::json(['errors' => true]);
        }

        $this->category->destroy($category);

        return Response::json(['errors' => false]);
    }
}
