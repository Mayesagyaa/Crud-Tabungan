<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', [StudentController::class, 'index'])->name('index');
Route::post('/store', [StudentController::class, 'store'])->name('store');
Route::get('/editStudent/{id}', [StudentController::class, 'edit'])->name('editStudent');
Route::post('/updateStudent/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::post('/delete/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');

