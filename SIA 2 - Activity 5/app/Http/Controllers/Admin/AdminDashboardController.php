<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1️⃣ Logged-in user info
        $currentUser = Auth::user();

        // 2️⃣ Search & Filter Logic
        $search = $request->get('search', '');
        $roleFilter = $request->get('role', '');

        // All users for total count
        $internalUsers = User::select('id', 'name', 'email', 'role', 'created_at')
            ->latest()
            ->get();

        // Filtered users
        $query = User::select('id', 'name', 'email', 'role', 'created_at')
            ->latest();

        // Search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Role filter
        if ($roleFilter) {
            $query->where('role', $roleFilter);
        }

        $filteredUsers = $query->limit(50)->get(); // Limit for performance

        // 3️⃣ External API - Weather (Hinunangan) - YOUR CODE UNCHANGED
        $weather = Cache::remember('admin_weather_Hinunangan', 600, function () {
            $apiKey = config('services.weather.key');
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => 'Hinunangan',
                'appid' => $apiKey,
                'units' => 'metric'
            ]);
            return $response->successful() ? $response->json() : null;
        });

        // 4️⃣ News (add if you have it)
        $news = [];

        return view('admin.dashboard', compact(
            'currentUser',
            'internalUsers',
            'filteredUsers',  // ✅ NEW
            'search',         // ✅ NEW
            'roleFilter',     // ✅ NEW
            'weather',
            'news'
        ));
    }
}