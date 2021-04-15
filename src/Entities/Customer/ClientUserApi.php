<?php

namespace Descom\B2b\Entities\Customer;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Customer\UserModel;

class ClientUserApi extends Api
{
    private string $uri = '/api/v1/clients';

    public function index(int $idClient, array $params = []): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idClient/users",
            [],
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function show(int $idClient, int $idUser): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idClient/users/$idUser",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function store(int $idClient, UserModel $model): ?object
    {
        $response = $this->connection->call(
            'POST',
            "$this->uri/$idClient/users",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function update(int $idClient, int $idUser, UserModel $model): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idClient/users/$idUser",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function destroy(int $idClient, int $idUser): ?bool
    {
        return $this->connection->call(
            'DELETE',
            "$this->uri/$idClient/users/$idUser",
        )->successful;
    }
}
