<?php

namespace Modules\Repository\Eloquent;

use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Repository\Contracts\RepositoryInterface;
use Modules\Repository\Exceptions\RepositoryException;

/**
 * Class BaseRepository
 * @package Modules\Repository\Eloquent
 * @author
 */
abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model|Builder
     */
    protected $model;

    /**
     * @param Application $app
     *
     * @throws RepositoryException|BindingResolutionException
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Set the "limit" value of the query.
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function limit(int $limit)
    {
        return $this->model->limit($limit)->get();
    }

    /**
     * Save a new entity in repository
     *
     * @param Model $model
     *
     * @return mixed
     */
    public function create(Model $model)
    {
        $model->save();

        return $model;
    }

    /**
     * Update or Create an entity in repository
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param         $id
     *
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        $model = $this->model->findOrFail($id);

        $model->fill($attributes);
        $model->save();

        return $model;
    }

    /**
     * Truncate a new entity in repository
     *
     * @return void
     */
    public function truncate(): void
    {
        $this->model->getQuery()->truncate();
    }

    /**
     * @return Model
     * @throws RepositoryException|BindingResolutionException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model"
            );
        }

        return $this->model = $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();
}
