<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteNameController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function() {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [DashBoardController::class, 'index'])->name('profile.index');
    Route::get('/notifications', [DashBoardController::class, 'index'])->name('notifications.index');
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard.index');

    Route::get('/settings', [DashBoardController::class, 'index'])->name('settings.index');
    Route::prefix('/profile')->group(function() {
        Route::get('/index', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/get', [ProfileController::class, 'get'])->name('profile.get');
    });

    Route::get('/notifications', [DashBoardController::class, 'index'])->name('notifications.index');
    Route::get('/anlytics', [DashBoardController::class, 'index'])->name('anlytics.index');
    Route::get('/leave', [DashBoardController::class, 'index'])->name('leave.index');
    Route::get('/overtime', [DashBoardController::class, 'index'])->name('overtime.index');
    Route::get('/report', [DashBoardController::class, 'index'])->name('report.index');

    Route::prefix('/sanctum')->group(function () {
        Route::get('/website', [WebsiteNameController::class, 'get'])->name('website.get');
        Route::get('/menu', [MenuItemController::class, 'get'])->name('menu.get');
    });
});

require __DIR__.'/auth.php';
