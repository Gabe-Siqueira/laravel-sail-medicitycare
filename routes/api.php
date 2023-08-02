<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\MedicoController;
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

Route::post('login', [AuthController::class, 'login']);
Route::get('cidades', [CidadeController::class, 'index']);
Route::get('cidades/{id_cidade}/medicos', [CidadeController::class, 'medicosPorCidade']);
Route::get('medicos', [MedicoController::class, 'index']);
Route::group(['middleware' => ['jwt.auth']], function(){
    // AuthController
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
