<?php

namespace Descom\B2b\Connection\Entities\Catalog;

use Descom\B2b\Connection\Api;
use Descom\B2b\Models\Catalog\MediaModel;

class MediaApi extends Api //TODO Revisar todo
{
    private string $uri = '/api/v1/medias';

    public function index(array $params = []): ?object
    {
        $response = $this->connection->call(
            'GET',
            $this->uri,
            null,
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function show(int $id): ?object
    {
        $response = $this->connection->call(
            'GET',
            "$this->uri/$id",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function store(MediaModel $model): ?object
    {
        $response = $this->connection->call(
            'POST',
            $this->uri,
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function update(int $id, MediaModel $model): ?object
    {
        $response = $this->connection->call(
            'PUT',
            "$this->uri/$id",
            $model->toArray()
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function destroy(int $id): ?bool
    {
        return $this->connection->call(
            'DELETE',
            "$this->uri/$id",
        )->successful;
    }
}
