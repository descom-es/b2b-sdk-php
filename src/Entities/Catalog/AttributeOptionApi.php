<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\AttributeOptionModel;

class AttributeOptionApi extends Api
{
    private string $uri = '/api/v1/attributes';

    public function index(int $idAttribute): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idAttribute/options",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function show(int $idAttribute, int $idOption): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idAttribute/options/$idOption",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function store(int $idAttribute, AttributeOptionModel $model): ?object
    {
        $response = $this->connection->call(
            'POST',
            "$this->uri/$idAttribute/options",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function update(int $idAttribute, int $idOption, AttributeOptionModel $model): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idAttribute/options/$idOption",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function destroy(int $idAttribute, int $idOption): ?bool
    {
        return $this->connection->call(
            'DELETE',
            "$this->uri/$idAttribute/options/$idOption",
        )->successful;
    }
}
