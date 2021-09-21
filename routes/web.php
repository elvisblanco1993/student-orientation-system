<?php

use App\Http\Controllers\OrientationController;
use App\Http\Controllers\UserController;
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
    return redirect(route('login'));
});

Route::get('/register/invitation/{token}/{orientation}', [UserController::class, 'register'])->name('register.invitation');
Route::post('/register/invitation', [UserController::class, 'store'])->name('register.store');


Route::middleware(['auth:sanctum', 'verified'])->group( function () {

    // Dashboard
    Route::get('/dashboard', [OrientationController::class, 'index'])->name('dashboard');

    // Create Orientation
    Route::get('/orientation/create', [OrientationController::class, 'create'])->middleware(['admin'])->name('orientation.create');

    // View Orientation
    Route::get('/orientation/{orientation}', [OrientationController::class, 'show'])->name('orientation.show');

    // Close and save orientation changes
    Route::get('/orientation/{orientation}/close', [OrientationController::class, 'close'])->name('orientation.close');

    // Finish the orientation
    Route::get('/orientation/{orientation}/finish', [OrientationController::class, 'finish'])->name('orientation.finish');

    // Get certificate of completion
    Route::get('/orientation/certificate/{user}/{orientation}', [OrientationController::class, 'certificate'])->name('orientation.certificate');

});

/**
 * Administrator only routes
 */
Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {

    // View orientation participants
    Route::get('orientation/{orientation}/participants', [OrientationController::class, 'participants'])->name('orientation.participants');

    // View orientation statistics
    Route::get('orientation/{orientation}/stats', [OrientationController::class, 'stats'])->name('orientation.stats');

    // View orientation settings
    Route::get('orientation/{orientation}/settings', [OrientationController::class, 'edit'])->name('orientation.settings');
});
