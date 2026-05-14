<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
    public function index(Request $request): View
    {
        $currentUser = auth()->user();
        $totalUsers = User::where('role', 'user')->count();

        // External API call
        $posts = Http::timeout(5)->get('https://jsonplaceholder.typicode.com/posts/1')->json();

        return view('user.dashboard', compact('currentUser', 'totalUsers', 'posts'));
    }
}