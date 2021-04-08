<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\CategoryModel;

class CategoryApi extends Api
{
    private string $uri = '/api/v1/categories';

    public function index(): ?object
    {
        $response = $this->connection->call(
            'GET',
            $this->uri,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function show(int $id): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$id",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function store(CategoryModel $model): ?object
    {
        $response = $this->connection->call(
            'POST',
            $this->uri,
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function update(int $id, CategoryModel $model): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$id",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function destroy(int $id): ?bool
    {
        return $this->connection->call(
            'DELETE',
            "$this->uri/$id",
        )->successful;
    }
}
