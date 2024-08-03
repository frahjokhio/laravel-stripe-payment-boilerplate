<?php

use App\Http\Controllers\StripeElementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// to get stripe client secret
Route::post('/stripe-client-secret', [StripeElementController::class, 'getClientSecret'])->name("api.stripe.client.secret");
