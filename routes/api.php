<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/demo', [ApiController::class, 'index']);


// Route::post('/register', [ApiController::class, 'register']);
//Route::post('/login', [ApiController::class, 'login']);
// Route::middleware('auth:api')->get('/user', [ApiController::class, 'user']);
// Route::middleware('auth')->get('/form', [ApiController::class, 'form']);