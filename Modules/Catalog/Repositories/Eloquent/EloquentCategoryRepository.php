<?php

namespace Modules\Catalog\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Catalog\Events\CategoryIsCreating;
use Modules\Catalog\Events\CategoryIsUpdating;
use Modules\Catalog\Events\CategoryWasCreated;
use Modules\Catalog\Events\CategoryWasUpdated;
use Modules\Catalog\Repositories\CategoryRepository;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
    public function create($data)
    {
        event($event = new CategoryIsCreating($data));
        $menuItem = $this->model->create($event->getAttributes());

        event(new CategoryWasCreated($menuItem));

        return $menuItem;
    }

    public function update($menuItem, $data)
    {
        event($event = new CategoryIsUpdating($menuItem, $data));
        $menuItem->update($event->getAttributes());

        event(new CategoryWasUpdated($menuItem));

        return $menuItem;
    }

    /**
     * Get online root elements
     *
     * @return object
     */
    public function rootsForCategory()
    {
        return $this->model->whereHas('translations', function (Builder $q) {
            $q->where('locale', App::getLocale());
        })->with('translations')->orderBy('parent_id', 'asc')->get();
    }

    /**
     * Get the root menu item for the given category id
     *

     * @return object
     */
    public function getRootForCategory()
    {
        return $this->model->with('translations')->firstOrFail();
    }

    /**
     * Return a complete tree for the given category id
     *
     * @return object
     */
    public function getTreeForCategory()
    {
        $items = $this->rootsForCategory();

        return $items->nest();
    }

    /**
     * @param  string $uri
     * @param  string $locale
     * @return object
     */
    public function findByUriInLanguage($uri, $locale)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($locale, $uri) {
            $q->where('status', 1);
            $q->where('locale', $locale);
            $q->where('uri', $uri);
        })->with('translations')->first();
    }
}
