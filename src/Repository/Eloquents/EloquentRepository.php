<?php

namespace Rebbull\Repo\Eloquents;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Rebbull\Repo\Contracts\RepositoryInterface;

class EloquentRepository implements RepositoryInterface {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function store(array $attributes): ?Model
    {
        return $this->model->create($attributes);
    }

    public function show(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function update(int $id ,array $attributes): bool
    {
        return $this->model->findOrfail($id)->update($attributes);
    }

    public function destroy(int $id): bool
    {
        return $this->model->findOrfail($id)->delete();
    }
}
