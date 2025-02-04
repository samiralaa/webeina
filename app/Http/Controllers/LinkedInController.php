<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class LinkedInController extends Controller
{
    // Redirect to LinkedIn for OAuth Authentication
    public function getCompanyPosts()
    {
        $companyId = "2540234";
        $companyUrn = "urn:li:organization:" . $companyId;
        $url = "https://api.linkedin.com/v2/shares"; // Correct endpoint
        $accessToken = 'AQXjSncUKtV2t1-eoCzmZ2z8K9VW2rTnUIND7KSw6lwCKMEZeu5sme7KUTI4ELlw-t3ak5lreNln0e1eJrDV5eslgUVGpdaQ_0eU4VJRJWbN2FhFqKNE9PoajmSqsXU8sGoKqMcyMAjPcKNvsAR6uzXS7tWqez9qEJ_KgGkcterPcHL5b_Mg5TmehWJDEKm9N_D08PWmwZVqIIQ7Ww2HbX7abZOKcXjSxybtC3gl12oHs7FGv5E7tX3VAnZWlzJRVMI8qUce_eGJQs7G22bIaWr89LKJ5J4OWL_gKnpNayFhwY3vWG4cC1kHW0L7IOl5nB_Uxb95wbj93AIF5Ex5BpFrujXOHw';
    
        $client = new Client();
    
        try {
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'q' => 'owners',
                    'owners' => $companyUrn, // Use URN-formatted company ID
                ],
            ]);
    
            $posts = json_decode($response->getBody(), true);
            return response()->json($posts);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to retrieve posts',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
