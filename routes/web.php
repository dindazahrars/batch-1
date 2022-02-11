<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/merchant', [MerchantController::class, 'index']);
Route::post('/merchant', [MerchantController::class, 'store']);
Route::put('/merchant/{id}/update', [MerchantController::class, 'update']);
Route::put('/merchant/{id}', [MerchantController::class, 'show']);
Route::delete('/merchant/{id}', [MerchantController::class, 'destroye']);

Route::get('/products', [MerchantController::class, 'index']);
Route::post('/products', [MerchantController::class, 'store']);
Route::put('/products/{id}/update', [MerchantController::class, 'update']);
Route::put('/products/{id}', [MerchantController::class, 'show']);
Route::delete('/products/{id}', [MerchantController::class, 'destroye']);
