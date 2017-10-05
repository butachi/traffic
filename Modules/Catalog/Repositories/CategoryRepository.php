<?php

namespace Modules\Catalog\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface CategoryRepository extends BaseRepository
{
    /**
     * Get online root elements
     *

     * @return object
     */
    public function rootsForCategory();

    /**
     * Get the root menu item for the given category id
     *
     * @return object
     */
    public function getRootForCategory();

    /**
     * Return a complete tree for the given category id
     *
     * @return object
     */
    public function getTreeForCategory();

    /**
     * @param  string $uri
     * @param  string $locale
     * @return object
     */
    public function findByUriInLanguage($uri, $locale);
}
