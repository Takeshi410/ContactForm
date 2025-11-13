<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModalController;

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

Route::get('/', [ContactsController::class, 'index']);
Route::post('/confirm', [ContactsController::class, 'confirm']);
Route::post('/thanks', [ContactsController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
});
Route::get('/admin/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::delete('/delete', [AdminController::class, 'destroy']);
