<?php

namespace Descom\B2b\Entities\Customer;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Customer\ClientModel;

class ClientApi extends Api
{
    private string $uri = '/api/v1/clients';

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

    public function store(ClientModel $model): ?object
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

    public function update(int $id, ClientModel $model): ?object
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
