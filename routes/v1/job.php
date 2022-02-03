<?php


use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::post('job/apply', [JobController::class, 'apply']);