<?php

namespace App\Http\Controllers;

use App\Services\LinkedInService;

class LinkedInController extends Controller
{
    protected $linkedInService;

    public function __construct(LinkedInService $linkedInService)
    {
        $this->linkedInService = $linkedInService;
    }

    /**
     * Fetch and display the organization IDs.
     */
    public function getOrganizationIds()
    {
        $tokenUrl = "https://www.linkedin.com/oauth/v2/AQU9uUZGYqSwhqp5EGwFYGYIVk6VVY6fcCJng6vCqb4mzEr05xc7PlaDbdpfbE_4rPv6234HsA5Phz20641s179VVE6NSPkTtIaH73SMPZMANaHprvCVcCH1FZ84sVMf3lFfxYop89LPDSvbjBv9hW1bIY0Hmd1P";
        $postData = [
            'grant_type' => 'authorization_code',
            'code' => $authorizationCode,
            'redirect_uri' => getenv('LINKEDIN_REDIRECT_URL'),
            'client_id' => getenv('LINKEDIN_CLIENT_ID'),
            'client_secret' => getenv('LINKEDIN_CLIENT_SECRET'),
        ];

        $response = file_get_contents($tokenUrl, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query($postData),
            ],
        ]));

        $data = json_decode($response, true);
        print_r($data);
    }
}
