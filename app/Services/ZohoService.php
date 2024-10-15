<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class ZohoService
{
    protected $client;
    protected $apiUrl;
    protected $accessToken;
    protected $refreshToken;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = env('ZOHO_API_URL');
        $this->refreshToken = env('ZOHO_REFRESH_TOKEN');
        $this->clientId = env('ZOHO_CLIENT_ID');
        $this->clientSecret = env('ZOHO_CLIENT_SECRET');

        // Retrieve the access token from cache or environment
        $this->accessToken = Cache::get('zoho_access_token', env('ZOHO_ACCESS_TOKEN'));
    }

    /**
     * Refresh the access token.
     *
     * @return void
     */
    protected function refreshAccessToken()
    {
        $url = 'https://accounts.zoho.eu/oauth/v2/token';

        try {
            $response = $this->client->post($url, [
                'form_params' => [
                    'refresh_token' => $this->refreshToken,
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'grant_type' => 'refresh_token',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            // Update access token and save it to cache
            $this->accessToken = $data['access_token'];
            Cache::put('zoho_access_token', $this->accessToken, $data['expires_in']);
        } catch (RequestException $e) {
            // Handle error
            \Log::error('Failed to refresh Zoho access token: ' . $e->getMessage());
        }
    }

    /**
     * Create a new lead in Zoho CRM.
     *
     * @param array $data
     * @return mixed
     */
    public function createLead(array $data)
    {
        $url = $this->apiUrl . '/crm/v2/Leads';

        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode([
                    'data' => [$data]
                ]),
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Check if the error is due to an expired token
            if ($e->getResponse()->getStatusCode() == 401) {
                // Token might be expired, refresh it
                $this->refreshAccessToken();

                // Retry the request with the new access token
                return $this->createLead($data);
            }

            // Handle other errors
            \Log::error('Zoho API Error: ' . $e->getMessage());
            return $e->getMessage();
        }
    }
}
