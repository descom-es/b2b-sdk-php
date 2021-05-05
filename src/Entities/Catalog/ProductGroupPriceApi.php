<?php

namespace Descom\B2b\Entities\Catalog;

use Descom\B2b\Entities\Api;
use Descom\B2b\Models\Catalog\ProductGroupPriceModel;

class ProductGroupPriceApi extends Api
{
    private string $uri = '/api/v1/products';


    public function update(int $idProduct, int $idGroup, ProductGroupPriceModel $model): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "{$this->uri}/{$idProduct}/groups/{$idGroup}/prices",
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
            "{$this->uri}/{$idProduct}/groups/{$idGroup}/prices",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }
}
