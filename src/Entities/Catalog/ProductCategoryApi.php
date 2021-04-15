<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;

class ProductCategoryApi extends Api
{
    private string $uri = '/api/v1/products';

    public function index(int $idProduct, array $params = []): ?array
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idProduct/categories",
            [],
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function attach(int $idProduct, int $idCategory): ?array
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idProduct/categories/$idCategory"
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function detach(int $idProduct, int $idCategory): ?array
    {
        $response = $this->connection->call(
            'DELETE',
            "$this->uri/$idProduct/categories/$idCategory"
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }
}
