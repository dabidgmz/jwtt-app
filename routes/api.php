<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\VitrinaController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\EmpresaUserRelacionController;
use App\Http\Controllers\EmpresaVitrinaController;
use App\Http\Controllers\DetalleSensorController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\adafruitController;
use App\Http\Controllers\DefinitiveController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UsuarioEmpresaController;
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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

*/

//rutas para usuario jwt
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);


Route::post('/Usuario/id', [DefinitiveController::class, 'getEmpresas']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para CRUD de Empresas
Route::get('/empresas', [EmpresaController::class, 'index']);
Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
Route::post('/empresas', [EmpresaController::class, 'create']);
Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);

//rutas para los sesnores
Route::get('/sensores/{id}', [SensorController::class, 'show']);
Route::post('/sensores', [SensorController::class, 'create']);
Route::put('/sensores/{id}', [SensorController::class, 'update']);
Route::delete('/sensores/{id}', [SensorController::class, 'destroy']);



// Rutas para el recurso Vitrina
Route::get('/vitrinas', [VitrinaController::class, 'index']);
Route::get('/vitrinas/{id}', [VitrinaController::class, 'show']);
Route::post('/vitrinas', [VitrinaController::class, 'create']);
Route::put('/vitrinas/{id}', [VitrinaController::class, 'update']);
Route::delete('/vitrinas/{id}', [VitrinaController::class, 'destroy']);
//esto esta privado

//rutas relacionales

//empresa usuario
Route::post('/relacionar-usuario-empresa', [UsuarioEmpresaController::class, 'relacionarUsuarioEmpresa']);
//empresa vitrina
Route::post('asociar-empresa-vitrina', [EmpresaVitrinaController::class, 'asociarEmpresaVitrina']);
Route::get('obtener-vitrinas-por-empresa/{empresaId}', [EmpresaVitrinaController::class, 'obtenerVitrinasPorEmpresa']);
// detalle sensor
Route::post('detalle-sensores', [DetalleSensorController::class, 'create']);
Route::put('detalle-sensores/{vitrinaId}/{sensorId}', [DetalleSensorController::class, 'update']);

//Sensores 
Route::get('humedad', [adafruitController::class, 'humedad']);
Route::get('temperatura', [adafruitController::class, 'temperatura']);
Route::get('gas', [adafruitController::class, 'gas']);
Route::get('impacto', [adafruitController::class, 'impacto']);
Route::get('luz', [adafruitController::class, 'luz']);
Route::get('vibracion', [adafruitController::class, 'vibracion']);
Route::get('ultrasonico', [adafruitController::class, 'ultrasonico']);
Route::get('feeds', [adafruitController::class, 'feeds']);

Route::get('/verify/{id}', [VerificationController::class, 'verify']);

