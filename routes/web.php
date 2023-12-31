<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//controladores
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=> ['auth']], function(){
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('tareas', TaskController::class);
    Route::resource('proyectos', ProjectController::class);
    Route::resource('comments', CommentController::class);
});
