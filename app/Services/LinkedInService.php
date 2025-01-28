<?php

namespace App\Services;

use GuzzleHttp\Client;

class LinkedInService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.linkedin.com/v2/',
        ]);
    }

    public function getPosts()
    {
        $accessToken = env('LINKEDIN_ACCESS_TOKEN');
        $organizationId = env('LINKEDIN_ORGANIZATION_ID');

        try {
            $response = $this->client->get('ugcPosts', [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                ],
                'query' => [
                    'q' => 'authors',
                    'authors' => "urn:li:organization:$organizationId",
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // لو حصل خطأ، رجّع الرسالة
            return ['error' => $e->getMessage()];
        }
    }
}
