<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;

class ProductMediaApi extends Api
{
    private string $uri = '/api/v1/products';

    public function index(int $idProduct, array $params = []): ?array
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idProduct/medias",
            [],
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function attach(int $idProduct, int $idMedia): ?array
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idProduct/medias/$idMedia"
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function detach(int $idProduct, int $idMedia): ?array
    {
        $response = $this->connection->call(
            'DELETE',
            "$this->uri/$idProduct/medias/$idMedia"
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function cover(int $idProduct, int $idMedia): ?array
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idProduct/medias/$idMedia/cover"
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }
}
