<?php

namespace App\Services;

use App\Entities\Server;
use App\Entities\Site;
use GuzzleHttp\Client;

class Connector
{
    private Client $httpClient;
    private Config $config;

    public function __construct(Client $httpClient, Config $config)
    {
        $this->httpClient = $httpClient;
        $this->config = $config;
    }

    /**
     * @return Server[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getServers(): array
    {
        $json = $this->call('/api/v1/servers/');

        return array_map(function ($properties) {
            return new Server((array) $properties);
        }, $json->servers);
    }

    public function getSites(Server $server): array
    {
        $json = $this->call('/api/v1/servers/' . $server->id . '/sites');

        return array_map(function ($properties) {
            return new Site((array) $properties);
        }, $json->sites);
    }

    private function call(string $uri)
    {
        $response = $this->httpClient->get(
            $uri,
            [
                'base_uri' => $this->config->get('forge.api.base_uri'),
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->config->get('forge.api.token'),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'http_errors' => true,
            ],
        );

        return json_decode($response->getBody()->getContents());
    }

}
