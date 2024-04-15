<?php

use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Site\SiteController;
use App\Models\Support;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [SiteController::class, 'home']);

Route::get('/supports/aprender', [SupportController::class, 'aprender'])->name('supports.aprender');
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports/edit/{id}', [SupportController::class, 'edit'])->name('supports.edit');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
