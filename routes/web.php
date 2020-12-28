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
Route::get('/homebook/create', [App\Http\Controllers\HomebookController::class, 'create'])->name('homebook:create')->middleware('auth');
Route::post('/homebook/create', [App\Http\Controllers\HomebookController::class, 'store']);

Route::get('/homebook/{homebook}/show', [App\Http\Controllers\HomebookController::class, 'show'])->name('homebook:show');
Route::get('/homebook/{homebook}/edit', [App\Http\Controllers\HomebookController::class, 'edit'])->name('homebook:edit');
Route::post('/homebook/{homebook}/edit', [App\Http\Controllers\HomebookController::class, 'update']);
Route::get('/homebook/{homebook}/delete', [App\Http\Controllers\HomebookController::class, 'delete'])->name('homebook:delete');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin:index');
Route::get('/admin/{homebook}/show', [App\Http\Controllers\AdminController::class, 'show'])->name('admin:show');
Route::get('/admin/{homebook}/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin:delete');
