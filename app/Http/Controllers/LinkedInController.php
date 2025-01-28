<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LinkedInController extends Controller
{
    // Redirect to LinkedIn for OAuth Authentication
    public function redirectToLinkedIn()
    {
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => env('LINKEDIN_CLIENT_ID'),
            'redirect_uri' => env('LINKEDIN_REDIRECT_URL'),
            'scope' => 'r_liteprofile r_organization_social r_organization',
        ]);

        return response()->json([
            'url' => "https://www.linkedin.com/oauth/v2/authorization?$query",
        ]);
    }

    // Handle LinkedIn OAuth Callback
    public function handleLinkedInCallback(Request $request)
    {
        $code = $request->input('code');

        $response = Http::asForm()->post('https://www.linkedin.com/oauth/v2/accessToken', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => env('LINKEDIN_REDIRECT_URL'),
            'client_id' => env('LINKEDIN_CLIENT_ID'),
            'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
        ]);

        $accessToken = $response->json()['access_token'];

        // Store token in session or database for later use
        session(['linkedin_access_token' => $accessToken]);

        return response()->json(['access_token' => $accessToken]);
    }

    // Fetch Organizations Where the User Is an Admin
    public function getOrganizations(Request $request)
    {
        $accessToken = session('linkedin_access_token');

        if (!$accessToken) {
            return response()->json(['error' => 'Authentication required.'], 401);
        }

        $response = Http::withToken($accessToken)
            ->get('https://api.linkedin.com/v2/organizationAcls', [
                'q' => 'roleAssignee',
                'role' => 'ADMINISTRATOR',
            ]);

        $data = $response->json();

        if (empty($data['elements'])) {
            return response()->json(['error' => 'No organizations found.']);
        }

        $organizations = [];
        foreach ($data['elements'] as $org) {
            $organizations[] = $org['organization'];
        }

        return response()->json($organizations);
    }

    // Fetch Posts for a Specific Organization
    public function getCompanyPosts(Request $request)
    {
        $accessToken = session('linkedin_access_token');
        $organizationId = $request->input('organizationId');

        if (!$accessToken) {
            return response()->json(['error' => 'Authentication required.'], 401);
        }

        if (!$organizationId) {
            return response()->json(['error' => 'organizationId is required.'], 400);
        }

        $posts = [];
        $start = 0;
        $count = 50;

        do {
            $response = Http::withToken($accessToken)
                ->get('https://api.linkedin.com/v2/ugcPosts', [
                    'q' => 'authors',
                    'authors' => $organizationId,
                    'start' => $start,
                    'count' => $count,
                ]);

            $data = $response->json();

            if (isset($data['elements'])) {
                $posts = array_merge($posts, $data['elements']);
            }

            $start += $count;
        } while (isset($data['paging']['links']) && count($data['paging']['links']) > 0);

        return response()->json($posts);
    }
}
