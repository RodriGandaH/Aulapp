<?php

use App\Http\Controllers\AulaController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaController;

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

Route::get('/eliminar-seccion', [SectionsController::class, 'busqueda'])->name('eliminar-seccion');
Route::get('/eliminar-aula', [AulaController::class, 'busqueda'])->name('eliminar-aula');
Route::get('/eliminar-carrera', [CarrerasController::class, 'busqueda'])->name('eliminar-carrera');
Route::get('/eliminar-materia', [MateriaController::class, 'busqueda'])->name('eliminar-materia');

//

Route::get('/carrera', [CarrerasController::class, 'index'])->name('carreras');
Route::post('/carrera', [CarrerasController::class, 'store'])->name('carreras');
Route::delete('/carrera/{carrera}', [CarrerasController::class, 'destroy'])->name('carreras-destroy');
//Route::delete('/docente/{id}', [DocenteController::class, 'destroy'])->name('docentes-destroy');
//Route::get('/docente/{id}', [DocenteController::class, 'update'])->name('docentes-update');
Route::get('/carrera/{id}', [CarrerasController::class, 'show'])->name('carreras-show');
Route::patch('/carrera/{id}', [CarrerasController::class, 'update'])->name('carreras-update');
Route::get('/carrera5', [CarrerasController::class, 'cancelar'])->name('carreras-noupdate');
//Route::get('/docente', [DocenteController::class, 'index'])->name('docentes');
//Route::post('/docente', [DocenteController::class, 'store'])->name('docentes');
>>>>>>> 36ce0c8edb9a6a96b3b1adb932a9d93c3c7bb424
Route::get('/seccion', [SectionsController::class, 'index'])->name('secciones');
Route::post('/seccion', [SectionsController::class, 'store'])->name('secciones');
Route::get('/aula', [AulaController::class, 'index'])->name('aulas');
Route::post('/aula', [AulaController::class, 'store'])->name('aulas');


/*Route::get('/seccion/{id}', [SectionsController::class, 'show'])->name('secciones-show');
Route::patch('/seccion/{id}', [SectionsController::class, 'update'])->name('secciones-update');
Route::delete('/seccion/{section}', [SectionsController::class, 'destroy'])->name('secciones-destroy');
Route::delete('/aula/{id}', [AulaController::class, 'destroy'])->name('aulas-destroy');

Route::get('/materia', [MateriaController::class, 'index'])->name('materias');
Route::post('/materia', [MateriaController::class, 'store'])->name('materias');
Route::delete('/materia/{materia}', [MateriaController::class, 'destroy'])->name('materias-destroy');
Route::get('/materia/{id}', [MateriaController::class, 'update'])->name('materias-update');

Route::get('/grupo', [GrupoController::class, 'index'])->name('grupos');
Route::post('/grupo', [GrupoController::class, 'store'])->name('grupos');

Route::get('/aula', function () {
    return view('adm_aulas');

});

*/





Route::get('/menu-adm', function () {
    return view('menu_administrador');
});

=======
});

Route::get('/menu-adm', function () {
    return view('menu_administrador');
});
Route::get('/rep', function () {
    return view('reportar');
});
Route::get('/eli', function () {
    return view('eliminar');
});
>>>>>>> 36ce0c8edb9a6a96b3b1adb932a9d93c3c7bb424
Route::get('/carrera', [CarrerasController::class, 'index'])->name('carreras');
Route::get('/carrera/{id}', [CarrerasController::class, 'update'])->name('carreras-update');

Route::get('/materiaEdit', [MateriaController::class, 'showEdit'])->name('materia_edit');
Route::get('/materia/{id}', [MateriaController::class, 'update'])->name('materias-update');