<?php

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
        Route::get('/create', [TeamsController::class, 'create'])->name('teams-create');
        Route::get('/{id}/edit', [TeamsController::class, 'edit'])->where('id', '[0-9]+')->name('teams-edit');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
