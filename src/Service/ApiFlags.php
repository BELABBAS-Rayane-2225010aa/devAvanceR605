<?php

namespace App\Service;

use App\Entity\Flag;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiFlags
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getFlags(): array
    {
        $response = $this->client->request('GET', 'http://127.0.0.1:8001/api/flags');
        $data = $response->toArray();

        $flags = [];
        foreach ($data['member'] as $item) {
            $flag = new Flag();
            $flag->setCountryName($item['countryName']);
            $flag->setFlagUrl($item['flagURL']);
            $flags[] = $flag;
        }

        return $flags;
    }

    public function getFlagById($id): ?Flag
    {
        $response = $this->client->request('GET', 'http://127.0.0.1:8001/api/flags/' . $id);
        $data = $response->toArray();

        $flag = new Flag();
        $flag->setId($data['id']);
        $flag->setCountryName($data['countryName']);
        $flag->setFlagUrl($data['flagURL']);

        return $flag;
    }

    public function createFlag($countryName, $flagURL): Flag
    {
        $response = $this->client->request('POST', 'http://127.0.0.1:8001/api/flags', [
            'json' => [
                'countryName' => $countryName,
                'flagURL' => $flagURL,
            ],
        ]);
        $data = $response->toArray();

        $flag = new Flag();
        $flag->setCountryName($data['countryName']);
        $flag->setFlagUrl($data['flagURL']);
        $flag->setId($data['id']);

        return $flag;
    }

    public function deleteFlag($id)
    {
        $response = $this->client->request('DELETE', 'http://127.0.0.1:8001/api/flags/' . $id);
        return $response->getStatusCode();
    }

    public function updateFlag($id, $countryName, $flagURL): Flag
    {
        $response = $this->client->request('PATCH', 'http://127.0.0.1:8001/api/flags/' . $id, [
            'json' => [
                'countryName' => $countryName,
                'flagURL' => $flagURL,
            ],
        ]);
        $data = $response->toArray();

        $flag = new Flag();
        $flag->setId($data['id']);
        $flag->setCountryName($data['countryName']);
        $flag->setFlagUrl($data['flagURL']);

        return $flag;
    }
}