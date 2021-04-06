<?php

namespace Descom\B2b\Connection;

use RuntimeException;
use GuzzleHttp\Client;

class Connection implements ConnectionInterface
{
    private static ?self $instance = null;

    private string $token;
    private Client $http;

    public function __construct(string $url, string $token, array $options = [])
    {
        $this->token = $token;

        $this->http = new Client(
            array_merge(
                [
                    'base_uri'    => $url,
                    'timeout'     => 600.0,
                    'http_errors' => false,
                    'headers'     => [
                        'accept'            => 'application/json',
                        'content-type'      => 'application/json',
                    ],
                ],
                $options
            )
        );
    }

    public static function getInstance(string $url, string $token, array $options = []): self
    {
        if (!static::$instance) {
            static::$instance = new static($url, $token, $options);
        }

        return static::$instance;
    }

    public function call(string $method, string $uri, ?array $data = null, ?array $params = null): Response
    {
        $response = null;

        try {
            $uri .= ($params) ? $this->getStrParams($params): '';

            if (!$data)
            {
                $response = $this->http->request($method, $uri, [
                    'headers' => [
                        'Authorization' => "Bearer {$this->token}",
                    ],
                ]);
            }
            else{
                $response = $this->http->request($method, $uri, [
                    'headers' => [
                        'Authorization' => "Bearer {$this->token}",
                    ],
                    'json' => $data,
                ]);
            }

            $responseContent = $response->getBody()->getContents(); //TODO Devuleve excepción en el show si no existe objeto

            return new Response($response->getStatusCode(), $responseContent);

        } catch (RuntimeException $err) {
            return new Response(null, json_encode([
                'message' => $err->getMessage(),
                'method'  => $method,
                'uri'     => $uri,
                'data'    => $data,
            ]));
        }
    }

    private function getStrParams(array $params = []): string
    {
        $strParams = '';

        $i = 0;
        foreach($params as $key => $value)
        {
            $strParams .= ($i===0) ? "?$key=$value" : "&$key=$value";
            $i++;
        }

        return $strParams;
    }
}
