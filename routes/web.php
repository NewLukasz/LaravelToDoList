<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/categories')->group(function(){
    Route::get('',[CategoryController::class,'index'])->middleware(['auth'])->name('categories');
    Route::post('/store',[CategoryController::class,'store'])->middleware(['auth']);
    Route::post('/delete',[CategoryController::class,'delete'])->middleware(['auth']);
    Route::post('/edit',[CategoryController::class,'edit'])->middleware(['auth']);
});

Route::prefix('/projects')->group(function(){
    Route::get('',[ProjectController::class,'index'])->middleware(['auth'])->name('projects');
    Route::post('/store',[ProjectController::class,'store'])->middleware(['auth']);
    Route::post('/delete',[ProjectController::class,'delete'])->middleware(['auth']);
    Route::post('/edit',[ProjectController::class,'edit'])->middleware(['auth']);
});

Route::prefix('/addNewTask')->group(function(){
    Route::get('',[TaskController::class,'prepareDataToAddTaskForm'])->middleware(['auth'])->name('addNewTask');
    Route::post('store',[TaskController::class,'store'])->middleware(['auth']);
});

Route::prefix('/allTasksOvierview')->group(function(){
    Route::get('',[TaskController::class,'index'])->middleware(['auth'])->name('allTasksOvierview');
    Route::post('setAsDone',[TaskController::class,'setAsDone'])->middleware(['auth']);
    Route::post('editTask',[TaskController::class,'editTask'])->middleware(['auth']);
});

require __DIR__.'/auth.php';
