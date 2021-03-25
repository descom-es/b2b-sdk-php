<?php

namespace Descom\B2b\Connection\Entities;

use Descom\B2b\Connection\Api;
use Descom\B2b\Connection\ConnectionInterface;
use Descom\B2b\Models\ClientModel;

class ClientApi extends Api
{
    protected function getUrl():string
    {
        return  '/api/v1/clients/';
    }

    public function store(ClientModel $client): ?object
    {
        return $this->_store($client);
    }

    public function update(int $clientId, ClientModel $client): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "/api/v1/clients/$clientId",
            $client->toArray(),
            null
        );

        if ($response->successful) {
            return $response->data;//TODO Group_id no válido
        }

        return null;
    }
}
