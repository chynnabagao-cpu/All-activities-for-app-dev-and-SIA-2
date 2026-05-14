<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoryFormController;

Route::get('/', [StoryFormController::class, 'create']);
Route::post('/', [StoryFormController::class, 'store']);

Route::get('/story-form', [StoryFormController::class, 'create']);
Route::post('/story-form', [StoryFormController::class, 'store']);
