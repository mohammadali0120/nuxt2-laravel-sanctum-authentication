<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



// Public routes

// product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'searchByName']);

// user auth
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


// Protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    // product
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    // user auth
    Route::post('/logout', [UserController::class, 'logout'])->middleware('log.route');
    Route::get('/logged-in-user-info', [UserController::class, 'loggedInUserInfo']);
});
