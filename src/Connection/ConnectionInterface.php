<?php

namespace Descom\B2b\Connection;

interface ConnectionInterface
{
    public function call(string $method, string $uri, ?array $data = null, ?array $params = null): Response;
}
