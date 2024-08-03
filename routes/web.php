<?php

use App\Http\Controllers\StripeElementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// show stripe element on UI
Route::get('/', [StripeElementController::class, 'index'])->name("stripe.element.show");

