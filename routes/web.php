<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

Route::get('/', [FormController::class, 'index'])->name('index');

Route::get('/create', [FormController::class, 'create'])->name('create');


Route::post('/store', [FormController::class, 'store'])->name('store');

Route::post('/delete', [FormController::class, 'delete'])->name('delete');

Route::get('/edit/{id}', [FormController::class, 'edit'])->name('edit');

Route::post('/update', [FormController::class, 'update'])->name('update');

Route::get('/test', [FormController::class, 'test'])->name('test');
