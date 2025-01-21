<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class LinkedInController extends Controller
{
    protected $clientId;
    protected $clientSecret;
    protected $redirectUri;

    public function __construct()
    {
        $this->clientId = env('LINKEDIN_CLIENT_ID');
        $this->clientSecret = env('LINKEDIN_CLIENT_SECRET');
        $this->redirectUri = env('LINKEDIN_REDIRECT_URI');
    }

    /**
     * Redirect to LinkedIn for authorization.
     */
    public function redirectToLinkedIn()
    {
        $url = "https://www.linkedin.com/oauth/v2/authorization?" . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'scope' => 'r_organization_social w_member_social',
        ]);

        return redirect($url);
    }

    /**
     * Handle LinkedIn callback and exchange code for access token.
     */
    public function handleCallback()
    {
        $code = request('code');

        if (!$code) {
            return redirect('/linkedin/auth')->with('error', 'Authorization code is missing.');
        }

        $response = Http::asForm()->post('https://www.linkedin.com/oauth/v2/accessToken', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirectUri,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        if ($response->failed()) {
            return redirect('/linkedin/auth')->with('error', 'Failed to fetch access token: ' . $response->body());
        }

        $data = $response->json();

        if (!isset($data['access_token'])) {
            return redirect('/linkedin/auth')->with('error', 'Access token not found in response.');
        }

        $accessToken = $data['access_token'];

        // Save the access token in the session or database
        session(['linkedin_access_token' => $accessToken]);

        return redirect('/linkedin/posts')->with('success', 'Access token retrieved successfully!');
    }

    /**
     * Fetch organization posts from LinkedIn.
     */
    public function fetchCompanyPosts()
    {
        $accessToken = session('linkedin_access_token');

        if (!$accessToken) {
            return redirect('/linkedin/auth')->with('error', 'Access token is missing. Please authenticate again.');
        }

        // Replace with your organization's LinkedIn URN
        $organizationId = 'urn:li:organization:YOUR_ORGANIZATION_ID';

        $response = Http::withToken($accessToken)->get("https://api.linkedin.com/v2/shares", [
            'q' => 'owners',
            'owners' => $organizationId,
        ]);

        if ($response->failed()) {
            return redirect('/linkedin/auth')->with('error', 'Failed to fetch posts: ' . $response->body());
        }

        $posts = $response->json();

        return view('linkedin.posts', compact('posts'));
    }
}
