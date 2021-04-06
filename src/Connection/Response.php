<?php

namespace Descom\B2b\Connection;

use Descom\B2b\Connection\Exceptions\NotFoundException;
use Descom\B2b\Connection\Exceptions\PermanentException;
use Descom\B2b\Connection\Exceptions\TemporaryException;

class Response
{
    /**
     * Respuesta es satisfactoria.
     */
    public bool $successful;

    /**
     * Http status de la petición, nulo es un caso de error de conexión.
     */
    public ?int $httpStatus;

    public $data;

    public function __construct(?int $httpStatus, string $data)
    {
        $this->httpStatus = $httpStatus;
        $this->data = json_decode($data);
        $this->successful = $httpStatus >= 200 && $httpStatus < 300;

        if ($this->responseFailedTemporary($httpStatus)) {
            throw new TemporaryException("{$httpStatus}: {$data}", $httpStatus ?? -1);
        }

        if ($this->responseFailedPermanent($httpStatus)) {
            throw new PermanentException("{$httpStatus}: {$data}", $httpStatus);
        }
    }

    private function responseFailedTemporary(?int $httpStatus): bool
    {
        return $httpStatus === 502
            || $httpStatus === 503
            || $httpStatus === 504
            || $httpStatus === null;
    }

    private function responseFailedPermanent(?int $httpStatus): bool
    {
        return $httpStatus !== 404
            && $httpStatus > 299;
    }
}
