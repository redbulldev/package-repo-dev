<?php

namespace Rebbull\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Rebbull\Repository\Contracts\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
    */
    public function store(array $attributes): ?Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Find model by id.
     *
     * @param int $id
     * @param array $columns
     * @return Model
     */
    public function show(int $id, array $columns = ['*']): ?Model
    {
        return $this->model->select($columns)->findOrFail($id);
    }

    /**
     * Update existing model.
     *
     * @param int $id
     * @param array $payload
     * @return bool
    */
    public function update(int $id ,array $attributes): bool
    {
        return $this->model->findOrfail($id)->update($attributes);
    }

    /**
     * Delete model by id.
     *
     * @param int $id
     * @return bool
    */
    public function destroy(int $id): bool
    {
        return $this->model->findOrfail($id)->delete();
    }

    /**
     * Get all trashed models.
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * Find trashed model by id.
     *
     * @param int $id
     * @return Model
     */
    public function findTrashedById(int $id): ?Model
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    /**
     * Find only trashed model by id.
     *
     * @param int $id
     * @return Model
     */
    public function findOnlyTrashedById(int $id): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($id);
    }

    /**
     * Restore model by id.
     *
     * @param int $id
     * @return bool
     */
    public function restoreById(int $id): bool
    {
        return $this->findOnlyTrashedById($id)->restore();
    }

    /**
     * Permanently delete model by id.
     *
     * @param int $id
     * @return bool
     */
    public function permanentlyDeleteById(int $id): bool
    {
        return $this->findTrashedById($id)->forceDelete();
    }
}
