<?php
namespace Modules\System\Entities\Roles;

use Modules\Core\Support\Traits\RepositoryTrait;

class IlluminateRoleRepository implements RoleRepositoryInterface
{
    use RepositoryTrait;

    /**
     * The Eloquent role model name.
     *
     * @var string
     */
    protected $model = 'Modules\System\Entities\Roles\EloquentRole';

    /**
     * Create a new Illuminate role repository.
     *
     * @param  string $model
     * @return \Modules\System\Entities\Roles\IlluminateRoleRepository
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            $this->model = $model;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function findById($id)
    {
        return $this
            ->createModel()
            ->newQuery()
            ->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function findBySlug($slug)
    {
        return $this
            ->createModel()
            ->newQuery()
            ->where('slug', $slug)
            ->first();
    }

    /**
     * {@inheritDoc}
     */
    public function findByName($name)
    {
        return $this
            ->createModel()
            ->newQuery()
            ->where('name', $name)
            ->first();
    }
}
