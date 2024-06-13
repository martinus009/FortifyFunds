<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::middleware(['auth:users'])->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::get('FortifyFunds/user/index', [DashboardController::class, 'Dashboard'])->name('Dashboard');
    Route::get('FortifyFunds/user/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('FortifyFunds/user/login', [LoginController::class, 'login'])->name('login');
Route::post('FortifyFunds/user/login/register', [LoginController::class, 'input'])->name('input');
Route::post('FortifyFunds/user/login', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('FortifyFunds/user/forgot-password', [LoginController::class, 'forgotpassword'])
    ->middleware('guest')
    ->name('forgot');

Route::post('FortifyFunds/user/forgot-password', [LoginController::class, 'resetpassword'])
    ->middleware('guest')
    ->name('reset');

Route::get('FortifyFunds/user/reset-password/{token}', [LoginController::class, 'passwordreset'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('FortifyFunds/user/reset-password', [LoginController::class, 'password'])
    ->middleware('guest')
    ->name('password');
