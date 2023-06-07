<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('voluntarios', App\Http\Controllers\API\VoluntarioAPIController::class);


Route::resource('voluntario_cursos', App\Http\Controllers\API\VoluntarioCursoAPIController::class);


Route::resource('actividads', App\Http\Controllers\API\ActividadAPIController::class);


Route::resource('voluntario_enfermedads', App\Http\Controllers\API\VoluntarioEnfermedadAPIController::class);

Route::resource('voluntario_situacion_laborals', App\Http\Controllers\API\VoluntarioSituacionLaboralAPIController::class);
Route::resource('voluntario_dignidad', App\Http\Controllers\API\VoluntarioDignidadesAPIController::class);

Route::resource('voluntario_actividad_fisica', App\Http\Controllers\API\VoluntarioActividadFisicaAPIController::class);

Route::resource('voluntario_discapacidad', App\Http\Controllers\API\VoluntarioDiscapacidadAPIController::class);

Route::resource('voluntario_vacuna', App\Http\Controllers\API\VoluntarioVacunaAPIController::class);

Route::post('voluntario_formacion_idioma', [App\Http\Controllers\API\VoluntarioFormacionAPIController::class, 'storeIdioma']);

Route::put('voluntario_formacion_idioma/{id}', [App\Http\Controllers\API\VoluntarioFormacionAPIController::class, 'updatIdioma']);

Route::resource('voluntario_formacion', App\Http\Controllers\API\VoluntarioFormacionAPIController::class);
