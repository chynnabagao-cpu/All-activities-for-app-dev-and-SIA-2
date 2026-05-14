<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Http\Request;  // ✅ ADD THIS
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// Public
Route::get('/', fn() => view('welcome'))->name('welcome');

// Protected Routes
Route::middleware('auth')->group(function () {

    // MAIN DASHBOARD - Smart Role Redirect WITH SEARCH PARAMS
    Route::get('/dashboard', function (Request $request) {
        $user = auth()->user();
        $target = $user->role === 'admin'
            ? route('admin.dashboard')
            : route('user.dashboard');

        // Preserve search/filter params
        $queryString = $request->query() ? '?' . $request->getQueryString() : '';
        return redirect()->intended($target . $queryString);
    })->name('dashboard');

    // ADMIN ROUTES - Middleware Protected
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    });

    // USER ROUTES
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    });

    // PROFILE (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});