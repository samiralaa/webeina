<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LinkedInService
{
    protected $accessToken;
    protected $client;

    public function __construct()
    {
        $this->accessToken = 'AQU9uUZGYqSwhqp5EGwFYGYIVk6VVY6fcCJng6vCqb4mzEr05xc7PlaDbdpfbE_4rPv6234HsA5Phz20641s179VVE6NSPkTtIaH73SMPZMANaHprvCVcCH1FZ84sVMf3lFfxYop89LPDSvbjBv9hW1bIY0Hmd1P';
        $this->client = new Client([
            'base_uri' => 'https://api.linkedin.com/v2/',
            'headers' => [
                'Authorization' => "Bearer {$this->accessToken}",
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ],
        ]);
    }

    /**
     * Get the organization IDs where the user is an administrator.
     */
    public function getOrganizationIds()
    {
        try {
            $response = $this->client->get('organizationalEntityAcls', [
                'query' => [
                    'q' => 'roleAssignee',
                    'role' => 'ADMINISTRATOR',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            // Extract organization IDs from the response
            $organizationIds = array_map(function ($element) {
                // Extract the numeric ID from the "organizationalTarget"
                return str_replace('urn:li:organization:', '', $element['organizationalTarget']);
            }, $data['elements']);

            return $organizationIds;
        } catch (RequestException $e) {
            return [
                'error' => $e->getMessage(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null,
            ];
        }
    }
}
