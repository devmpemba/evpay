<?php

namespace EvMak;

use GuzzleHttp\Client as HttpClient;

class Client
{
    protected $baseUrl;
    protected $username;
    protected $http;

    public function __construct($baseUrl, $username)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->username = $username;
        $this->http = new HttpClient();
    }

    public function post($endpoint, $data)
    {
        $response = $this->http->post($this->baseUrl . $endpoint, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => $data
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getUsername()
    {
        return $this->username;
    }
}