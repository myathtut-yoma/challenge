<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'list']);
Route::post('posts/reaction', [PostController::class, 'toggleReaction']);