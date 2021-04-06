<?php

namespace Descom\B2b\Connection\Entities\Customers;

use Descom\B2b\Connection\Api;
use Descom\B2b\Models\Customers\ShopModel;
use Descom\B2b\Models\Customers\ClientModel;

class ClientShopApi extends Api
{
    private string $uri = '/api/v1/clients';

    public function index(int $idClient, array $params = []): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idClient/shops",
            null,
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function show(int $idClient, int $idShop): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idClient/shops/$idShop",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function store(int $idClient, ShopModel $model): ?object
    {
        $response = $this->connection->call(
            'POST',
            "$this->uri/$idClient/shops",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function update(int $idClient, int $idShop, ShopModel $model): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idClient/shops/$idShop",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function destroy(int $idClient, int $idShop): ?bool
    {
        return $this->connection->call(
            'DELETE',
            "$this->uri/$idClient/shops/$idShop",
        )->successful;
    }
}
