<?php

namespace Descom\B2b\Entities;

use Descom\B2b\Connection\ConnectionInterface;

abstract class Api
{
    protected ConnectionInterface $connection;

    private function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public static function getInstance(ConnectionInterface $connection): self
    {
        return new static($connection);
    }
}
