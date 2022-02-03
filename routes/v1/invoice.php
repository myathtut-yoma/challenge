<?php


use App\Http\Controllers\InternetServiceProviderController;
use Illuminate\Support\Facades\Route;

Route::post('mpt/invoice-amount', [InternetServiceProviderController::class, 'getMptInvoiceAmount']);
Route::post('ooredoo/invoice-amount', [InternetServiceProviderController::class, 'getOoredooInvoiceAmount']);