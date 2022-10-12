<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

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
 
//Home
Route::get('/', [HomeController::class,"index"])->name('home');

//Todo
Route::prefix('/todo')->group(function(){
    Route::get('/', [TodoController::class,"index"])->name('todo');
    Route::post('/insert',[TodoController::class,"insert"])->name('todo.insert');
    Route::get('/{task_id}/delete',[TodoController::class,"delete"])->name('todo.delete');
    Route::get('/{task_id}/complete',[TodoController::class,"complete"])->name('todo.complete');
    Route::get('/{task_id}/not_complete',[TodoController::class,"not_complete"])->name('todo.not_complete');


   

});