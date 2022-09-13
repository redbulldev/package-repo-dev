<?php

namespace Rebbull\Repository\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all models.
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $attributes, array $relations = []): Collection;

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function store(array $attributes): ?Model;

    /**
     * Show model by id.
     *
     * @param int $id
     * @param array $columns
     * @return Model
     */
    public function show(int $id): ?Model;

    /**
     * Update existing model.
     *
     * @param int $id
     * @param array $payload
     * @return bool
     */
    public function update(int $id ,array $attributes): bool;

    /**
     * Delete model by id.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

    /**
     * Get all trashed models.
     *
     * @return Collection
     */
    public function allTrashed(): Collection;


    /**
     * Find trashed model by id.
     *
     * @param int $id
     * @return Model
     */
    public function findTrashedById(int $id): ?Model;

    /**
     * Find only trashed model by id.
     *
     * @param int $id
     * @return Model
     */
    public function findOnlyTrashedById(int $id): ?Model;

    /**
     * Restore model by id.
     *
     * @param int $id
     * @return bool
     */
    public function restoreById(int $id): bool;

    /**
     * Permanently delete model by id.
     *
     * @param int $id
     * @return bool
     */
    public function permanentlyDeleteById(int $id): bool;
}

