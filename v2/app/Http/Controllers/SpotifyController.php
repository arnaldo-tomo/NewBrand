<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    private function accessToken(): ?string
    {
        $clientId     = config('services.spotify.client_id');
        $clientSecret = config('services.spotify.client_secret');
        $refreshToken = config('services.spotify.refresh_token');

        if (!$clientId || !$clientSecret || !$refreshToken) return null;

        return Cache::remember('spotify_access_token', 3500, function () use ($clientId, $clientSecret, $refreshToken) {
            $response = Http::asForm()->withBasicAuth($clientId, $clientSecret)->post(
                'https://accounts.spotify.com/api/token',
                ['grant_type' => 'refresh_token', 'refresh_token' => $refreshToken]
            );
            return $response->json('access_token');
        });
    }

    public function nowPlaying()
    {
        $token = $this->accessToken();
        if (!$token) return response()->json(['playing' => false]);

        $response = Http::withToken($token)
            ->get('https://api.spotify.com/v1/me/player/currently-playing');

        if ($response->status() === 204 || $response->failed()) {
            return response()->json(['playing' => false]);
        }

        $data = $response->json();
        if (empty($data['is_playing']) || empty($data['item'])) {
            return response()->json(['playing' => false]);
        }

        $item = $data['item'];
        return response()->json([
            'playing'  => true,
            'title'    => $item['name'],
            'artist'   => collect($item['artists'])->pluck('name')->join(', '),
            'album'    => $item['album']['name'] ?? '',
            'cover'    => $item['album']['images'][1]['url'] ?? ($item['album']['images'][0]['url'] ?? null),
            'url'      => $item['external_urls']['spotify'] ?? '#',
            'progress' => $data['progress_ms'] ?? 0,
            'duration' => $item['duration_ms'] ?? 0,
        ]);
    }

    public function auth()
    {
        $url = 'https://accounts.spotify.com/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id'     => config('services.spotify.client_id'),
            'scope'         => 'user-read-currently-playing user-read-playback-state',
            'redirect_uri'  => route('spotify.callback'),
        ]);
        return redirect($url);
    }

    public function callback(Request $request)
    {
        $response = Http::asForm()->withBasicAuth(
            config('services.spotify.client_id'),
            config('services.spotify.client_secret')
        )->post('https://accounts.spotify.com/api/token', [
            'grant_type'   => 'authorization_code',
            'code'         => $request->get('code'),
            'redirect_uri' => route('spotify.callback'),
        ]);

        $refreshToken = $response->json('refresh_token');
        if (!$refreshToken) {
            return response('Spotify auth failed: ' . $response->body(), 400);
        }

        return response()->view('spotify-setup', ['refresh_token' => $refreshToken]);
    }
}
