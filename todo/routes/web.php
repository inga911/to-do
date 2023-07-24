<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController as TD;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('todo')->name('todo-')->group(function () {
    Route::get('/', [TD::class, 'index'])->name('index');
    Route::get('/create', [TD::class, 'create'])->name('create');
    Route::post('/store', [TD::class, 'store'])->name('store');
    Route::get('/show/{todo}', [TD::class, 'show'])->name('show');
    Route::get('/edit/{todo}', [TD::class, 'edit'])->name('edit');
    Route::put('/edit/{todo}', [TD::class, 'update'])->name('update');
    Route::delete('/delete/{todo}', [TD::class, 'destroy'])->name('delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
