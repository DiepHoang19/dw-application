<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [FurnitureController::class, 'index']);
Route::resource('furniture', FurnitureController::class)->only(['index', 'create', 'store']);
Route::get('/furniture/{id}/edit', [FurnitureController::class, 'edit'])->name('furniture.edit');
Route::put('/furniture/{id}', [FurnitureController::class, 'update'])->name('furniture.update');
Route::delete('/furniture/{id}', [FurnitureController::class, 'destroy'])->name('furniture.destroy');
Route::get('/furniture-trash', [FurnitureController::class, 'trash'])->name('furniture.trash');
Route::put('/furniture/{id}/restore', [FurnitureController::class, 'restore'])->name('furniture.restore');
Route::delete('/furniture/{id}/force-delete', [FurnitureController::class, 'forceDelete'])->name('furniture.forceDelete');