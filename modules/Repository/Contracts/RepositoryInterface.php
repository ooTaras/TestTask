<?php

namespace Modules\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryInterface
 * @package Modules\Repository\Contracts
 * @author
 */
interface RepositoryInterface
{
    /**
     * Set the "limit" value of the query.
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function limit(int $limit);

    /**
     * Save a new entity in repository
     *
     * @param Model $model
     *
     * @return mixed
     */
    public function create(Model $model);

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Update or Create an entity in repository
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Truncate a new entity in repository
     */
    public function truncate(): void;
}
