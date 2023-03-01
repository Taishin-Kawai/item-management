<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')
  ->middleware(['auth'])
  ->name('user.')
  ->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
    Route::post('/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
    Route::post('/{id}/destroy', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
    Route::get('/confirm', [App\Http\Controllers\HomeController::class, 'confirm'])->name('confirm');
  });

Route::prefix('items')
  ->middleware(['auth'])
  ->name('item.')
  ->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('add');
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('add');
    Route::get('/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    Route::post('/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('update');
    Route::post('/{id}/destroy', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroy');
  });
