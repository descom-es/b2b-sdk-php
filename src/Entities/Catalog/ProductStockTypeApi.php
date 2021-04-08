<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\ProductStockTypeModel;

class ProductStockTypeApi extends Api
{
    private string $uri = '/api/v1/products';

    public function index(int $idProduct): ?array
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$idProduct/stock_types",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function attach(int $idProduct, int $idCategory, ProductStockTypeModel $model): ?array
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$idProduct/stock_types/$idCategory",
            $model->toArray()
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
