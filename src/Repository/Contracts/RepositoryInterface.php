<?php

namespace Rebbull\Repository\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {

    public function all(array $attributes, array $relations = []): Collection;

    public function store(array $attributes): ?Model;

    public function show(int $id): ?Model;

    public function update(int $id ,array $attributes): bool;

    public function destroy(int $id): bool;
}

