<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StatusController;

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
    return view('index');
});

// Route::resource('dashboard', DashboardController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);



Route::get('/dashboard/status', function () {
    return view('dashboard.status');
})->middleware(['auth', 'verified'])->name('status');

Route::get('/dashboard/editrack/{id}/edit', [DashboardController::class, 'edit'], function () {
    return view('dashboard.editrack');
})->middleware(['auth', 'verified'])->name('editrack');

Route::post('/dashboard/editrack/{id}/update', [DashboardController::class, 'update'], function () {
    return view('dashboard.status');
})->middleware(['auth', 'verified'])->name('editracksave');

Route::get('/api/status', [StatusController::class, 'index'])->name('apistatus');



Route::resource('purchase', PurchaseController::class);
Route::resource('process', ProcessController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
