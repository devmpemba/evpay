<?php

namespace EvMak;

class Payment
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function request(array $data)
    {
        $payload = [
            "api_source" => $data['api_source'],
            "api_to" => $data['api_to'],
            "amount" => $data['amount'],
            "product" => $data['product'],
            "callback" => $data['callback'],
            "user" => $this->client->getUsername(),
            "mobileNo" => $data['mobileNo'],
            "reference" => $data['reference'],
            "callbackstatus" => "Success",
            "hash" => Utils::generateHash($this->client->getUsername())
        ];

        return $this->client->post('/test/', $payload);
    }
}