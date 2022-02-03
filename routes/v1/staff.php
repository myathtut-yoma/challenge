<?php


use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::post('staff/salary', [StaffController::class, 'payroll']);
