<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans_notify', [frontendController::class, 'midtrans_notify']);

// Route::controller(frontendController::class)->group(function() {
//     Route::middleware(['auth'])->group(function () {
//         Route::post('/midtrans_notify', 'midtrans_notify')->name('midtrans_notify');
//     });
// });
