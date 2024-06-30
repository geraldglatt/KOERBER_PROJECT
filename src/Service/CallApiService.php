<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Routing\Annotation\Route;

class CallApiService 
{
    private $client;

    public function __construct(httpClientInterface $client) 
    {
        $this->client = $client;
    }

    #[Route('/api/external/getSfDoc', name: 'external_api', methods: 'GET')]
    public function getNameData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.orphacode.org/openapi.json'
        );

        $content = $response->toArray();

        return $content;

    }

    #[Route('/api/external/getSfDoc', name: 'external_api', methods: 'GET')]
    public function getCommuneData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://geo.api.gouv.fr/communes?codePostal=89140'
        );

        $content = $response->toArray();

        return $content;

    }

    #[Route('/api/external/getSfDoc', name: 'external_api', methods: 'GET')]
    public function getDepartementData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://geo.api.gouv.fr/departements/89/communes'
        );

        $content = $response->toArray();

        return $content;

    }

}