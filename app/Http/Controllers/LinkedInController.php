<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
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

    public function getSpecificCompanyPosts()
    {

        $accessToken = env('LINKEDIN_ACCESS_TOKEN'); // Use the token from .env
        $organizationId = '2540234'; // Replace with your organization ID
        $response = Http::withToken($accessToken)
            ->timeout(30) // Set timeout to 30 seconds
            ->get("https://api.linkedin.com/v2/ugcPosts", [
                'q' => 'authors',
                'authors' => "urn:li:organization:2540234",
            ]);


        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json([
            'error' => $response->body(),
        ], $response->status());
    }
}
