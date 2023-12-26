<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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
Route::get('/hello', function () {
    return "Hello". "World";
});

Route::get('task',[CrudController::class,'index'])->middleware('check');
Route::get('tasks',[CrudController::class,'tasks'])->name('tasks')->middleware('check');
Route::post('/store',[CrudController::class,'store'])->name('store.task');
Route::PUT('/update/{id}',[CrudController::class,'update'])->name('update.task');
Route::get('delete/{id}',[CrudController::class,'delete'])->name('delete.task');
Route::post('/feedback',[CrudController::class,'feedback'])->name('feedback');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
