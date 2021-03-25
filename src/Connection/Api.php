<?php

namespace Descom\B2b\Connection;

use Descom\B2b\Models\Model;

abstract class Api
{
    protected ConnectionInterface $connection;

    abstract protected function getUrl(): string;

    private function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public static function getInstance(ConnectionInterface $connection): self
    {
        return new static($connection);
    }

    public function index(array $params = []): ?object
    {
        $response = $this->connection->call(
            'GET',
            $this->getUrl(),
            null,
            $params,
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    public function show(int $clientId): ?object
    {
        $response = $this->connection->call(
            'GET',
            "{$this->getUrl()}$clientId",
        );

        if ($response->successful) {
            return $response->data;
        }

        return null;
    }

    protected function _store(Model $model): ?object
    {
        $response = $this->connection->call(
            'POST',
            $this->getUrl(),
            $model->toArray(),
            null
        );

        if ($response->successful) {
            return $response->data;//TODO Group_id no válido
        }

        return null;
    }

    public function destroy(int $id): ?bool
    {
        return $this->connection->call(
            'DELETE',
            "{$this->getUrl()}$id",
        )->successful;
    }
}
