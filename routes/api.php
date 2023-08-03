<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\PacienteController;
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

// AuthController
Route::post('login', [AuthController::class, 'login']);

// CidadeController
Route::get('cidades', [CidadeController::class, 'index']);

// MedicoController
Route::get('medicos', [MedicoController::class, 'index']);
Route::get('cidades/{id_cidade}/medicos', [MedicoController::class, 'listarPorCidade']);

Route::group(['middleware' => ['jwt.auth']], function(){
    // AuthController
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    // MedicoController
    Route::post('medicos/{id_medico}/pacientes', [MedicoController::class, 'vincularPaciente']);

    // PacienteController
    Route::get('/medicos/{id_medico}/pacientes', [PacienteController::class, 'listarPorMedico']);
    Route::post('pacientes', [PacienteController::class, 'store']);
    Route::post('/pacientes/{id_paciente}', [PacienteController::class, 'update']);
});
