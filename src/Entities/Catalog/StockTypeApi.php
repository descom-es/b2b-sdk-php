<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\StockTypeModel;

class StockTypeApi extends Api
{
    private string $uri = '/api/v1/stock_types';

    public function index(array $params = []): ?object
    {
        $response = $this->connection->call(
            'GET',
            $this->uri,
            null,
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

    public function store(StockTypeModel $model): ?object
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

    public function update(int $id, StockTypeModel $model): ?object
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
