<?php

namespace EvMak;

class Reconciliation
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function check($reference)
    {
        $payload = [
            "reference" => $reference,
            "user" => $this->client->getUsername(),
            "hash" => Utils::generateHash($this->client->getUsername())
        ];

        return $this->client->post('/recon/', $payload);
    }
}