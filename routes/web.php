<?php

use App\Http\Controllers\PlayersController;
use App\Http\Controllers\TeamsController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Group: Rotas Apenas logado.
Route::middleware(['auth'])->group(function(){
    
    // Group: Teams
    Route::prefix('teams')->group(function(){
        Route::get('', [TeamsController::class, 'index'])->name('teams-index');
        Route::any('/create', [TeamsController::class, 'create'])->name('teams-create');
        Route::post('/store', [TeamsController::class, 'store'])->name('teams-store');
        Route::get('/{id}/edit', [TeamsController::class, 'edit'])->where('id', '[0-9]+')->name('teams-edit');
        Route::put('/{id}/update', [TeamsController::class, 'update'])->where('id', '[0-9]+')->name('teams-update');
        Route::delete('/{id}', [TeamsController::class, 'destroy'])->where('id', '[0-9]+')->name('teams-destroy');
    });

    // Group: Players
    Route::prefix('players')->group(function(){
        Route::get('', [PlayersController::class, 'index'])->name('players-index');
        Route::any('/create', [PlayersController::class, 'create'])->name('players-create');
        Route::post('/store', [PlayersController::class, 'store'])->name('players-store');
        Route::get('/{id}/edit', [PlayersController::class, 'edit'])->where('id', '[0-9]+')->name('players-edit');
        Route::put('/{id}/update', [PlayersController::class, 'update'])->where('id', '[0-9]+')->name('players-update');
        Route::delete('/{id}', [PlayersController::class, 'destroy'])->where('id', '[0-9]+')->name('players-destroy');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
