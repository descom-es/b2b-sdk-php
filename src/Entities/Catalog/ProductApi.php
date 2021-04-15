<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\BrandModel;
use Descom\B2b\Models\Catalog\ProductModel;

class ProductApi extends Api
{
    private string $uri = '/api/v1/products';

    public function index(array $params = []): ?object
    {
        $response = $this->connection->call(
            'GET',
            $this->uri,
            [],
            $params,
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

    public function store(ProductModel $model): ?object
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

    public function update(int $id, ProductModel $model): ?object
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
