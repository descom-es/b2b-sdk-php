<?php

namespace Descom\B2b\Connection\Entities;

use Descom\B2b\Connection\Api;
use Descom\B2b\Models\ClientModel;
use Descom\B2b\Models\GroupModel;

class GroupApi extends Api
{
    protected function getUrl():string
    {
        return  '/api/v1/groups/';
    }

    public function store(GroupModel $group): ?object
    {
        return $this->_store($group);
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
            return $response->data;
        }

        return null;
    }
}
