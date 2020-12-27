<?php

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

Route::get('/homebook', [App\Http\Controllers\HomebookController::class, 'index'])->name('homebook:index');

//Route::get('/homebook/index', [App\Http\Controllers\HomebookController::class, 'index'])->name('homebook:index');
Route::get('/homebook/create', [App\Http\Controllers\HomebookController::class, 'create'])->name('homebook:create');
Route::post('/homebook/create', [App\Http\Controllers\HomebookController::class, 'store']);

Route::get('/homebook/{homebook}/show', [App\Http\Controllers\HomebookController::class, 'show'])->name('homebook:show');
