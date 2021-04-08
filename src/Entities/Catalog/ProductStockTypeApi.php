<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;

class ProductStockTypeApi extends Api
{
    private string $uri = '/api/v1/products';

    public function index(int $idProduct, array $params = []): ?array
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idProduct/stock_types",
            null,
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function attach(int $idProduct, int $idCategory, int $stock): ?array
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idProduct/stock_types/$idCategory",
            [
                'stock' => $stock,
            ]
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function detach(int $idProduct, int $idCategory): int
    {
        $response = $this->connection->call(
            'DELETE',
            "$this->uri/$idProduct/stock_types/$idCategory"
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }
}
