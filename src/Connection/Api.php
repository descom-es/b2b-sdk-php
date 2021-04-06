<?php

namespace Descom\B2b\Connection;

use Descom\B2b\Models\Model;

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
