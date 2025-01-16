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

    public function handleCallback()
    {
        $code = request('code');

        $response = Http::asForm()->post('https://www.linkedin.com/oauth/v2/accessToken', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirectUri,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        $accessToken = $response->json()['access_token'];

        // Save the access token in the session or database
        session(['linkedin_access_token' => $accessToken]);

        return redirect('/linkedin/posts');
    }

    public function fetchCompanyPosts()
    {
        $accessToken = session('linkedin_access_token');

        if (!$accessToken) {
            return redirect('/linkedin/auth');
        }

        // Replace with your organization's LinkedIn URN
        $organizationId = 'urn:li:organization:YOUR_ORGANIZATION_ID';

        $response = Http::withToken($accessToken)->get("https://api.linkedin.com/v2/shares", [
            'q' => 'owners',
            'owners' => $organizationId,
        ]);

        $posts = $response->json();

        return view('linkedin.posts', compact('posts'));
    }
}
