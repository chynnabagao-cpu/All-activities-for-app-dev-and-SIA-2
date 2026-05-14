<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->get('city', 'Hinunangan');
        $apiKey = config('services.weather.key');

        // 🎯 BONUS: Cache for 10 minutes
        $weather = Cache::remember("weather_{$city}", 600, function () use ($city, $apiKey) {
            $response = Http::timeout(10)->get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'en'
            ]);

            return $response->successful() ? $response->json() : null;
        });

        // 🎯 BONUS: Error handling
        if (!$weather) {
            return response()->json([
                'error' => 'Weather data unavailable',
                'city' => $city
            ], 503);
        }

        return response()->json([
            'success' => true,
            'data' => $weather,
            'city' => $city
        ]);
    }
}