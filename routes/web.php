<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


Route::group(['middleware' => 'websiteLanguage'], function() 
{
    Route::get('/listtask', [TaskController::class, 'index'])->name('task.index');
    Route::get('change-language/{language}', [TaskController::class, 'changeLanguage'])->name('task.language')->middleware('websiteLanguage');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::get('/task/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/{task}', [TaskController::class, 'update'])->name('task.update');
});