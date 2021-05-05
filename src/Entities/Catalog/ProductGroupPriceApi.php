<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\ProductGroupPriceModel;

class ProductGroupPriceApi extends Api
{
    private string $uri = '/api/v1/products';


    public function update(int $idProduct, int $idGroup, ProductGroupPriceModel $model): ?array
    {
        $response = $this->connection->call(
            'PUT',
            "{$this->uri}/{$idProduct}/groups/{$idGroup}",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function destroy(int $idProduct, int $idGroup): int
    {
        $response = $this->connection->call(
            'DELETE',
            "{$this->uri}/{$idProduct}/groups/{$idGroup}",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }
}
