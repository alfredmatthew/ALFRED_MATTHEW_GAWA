<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// API route to fetch ideas as JSON
Route::get('/api/ideas', [BlogController::class, 'fetchIdeas']);
