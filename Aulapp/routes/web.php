<?php

use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CarrerasController;
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
Route::get('/carrera', [CarrerasController::class, 'index'])->name('carreras');
Route::post('/carrera', [CarrerasController::class, 'store'])->name('carreras');
Route::delete('/carrera/{id}', [CarrerasController::class, 'destroy'])->name('carreras-destroy');
Route::delete('/docente/{id}', [DocenteController::class, 'destroy'])->name('docentes-destroy');

Route::get('/carrera/{id}', [CarrerasController::class, 'update'])->name('carreras-update');
Route::get('/docente', [DocenteController::class, 'index'])->name('docentes');
Route::post('/docente', [DocenteController::class, 'store'])->name('docentes');
Route::get('/seccion', [SectionsController::class, 'index'])->name('secciones');
Route::post('/seccion', [SectionsController::class, 'store'])->name('secciones');
Route::get('/seccion/{id}', [SectionsController::class, 'show'])->name('secciones-show');
Route::patch('/seccion/{id}', [SectionsController::class, 'update'])->name('secciones-update');
Route::delete('/seccion/{id}', [SectionsController::class, 'destroy'])->name('secciones-destroy');

Route::get('/aula', function () {
    return view('adm_aulas');
});

Route::resource('materia', MateriaController::class);