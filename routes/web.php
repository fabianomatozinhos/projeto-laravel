<?php

use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Autenticador;

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
    return redirect('/series');
})->middleware(Autenticador::class);

// Route::get('/series', [SeriesController::class, 'index']);
// Route::get('/series/criar', [SeriesController::class, 'create']);
// Route::post('/series/salvar', [SeriesController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('logar');
Route::get('/registrar', [UsersController::class, 'create'])->name(('user.create'));
Route::post('/registrar', [UsersController::class, 'store'])->name(('user.store'));
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series',  'index')->name('series.index');
    Route::get('/series/criar',  'create')->name('series.create');
    Route::post('/series/salvar',  'store')->name('series.store');
    Route::delete('/series/destroy/{serie}',  'destroy')->name('series.destroy');
    Route::get('/series/edit/{serie}',  'edit')->name('series.edit');
    Route::put('/series/update/{serie}',  'update')->name('series.update');

    Route::get('/series/{serie}/temporada', [TemporadaController::class, 'index'])->name('temporada.index');
    
    Route::get('/series/{temporada}/episodio', [EpisodioController::class, 'index'])->name('episodio.index');
    Route::post('/series/{temporada}/episodio', [EpisodioController::class, 'update'])->name('episodio.atualizar');
});
