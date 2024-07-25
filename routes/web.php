<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\DashboardController;
use App\Models\Admin;
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

// ROUTE MIDDLEWARE USER
Route::middleware(['auth:users'])->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::get('FortifyFunds/user/index', [DashboardController::class, 'Dashboard'])->name('Dashboard');
    Route::get('FortifyFunds/user/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('FortifyFunds/user/about', [DashboardController::class, 'about'])->name('about');
    Route::get('FortifyFunds/user/news', [DashboardController::class, 'news'])->name('news');
    Route::get('FortifyFunds/user/news-detail/{slug}', [DashboardController::class, 'newsDetail'])->name('news.detail');
    Route::get('FortifyFunds/user/contact', [DashboardController::class, 'contact'])->name('contact');
    Route::get('FortifyFunds/user/information', [DashboardController::class, 'information'])->name('information');
    Route::get('FortifyFunds/user/invest-detail/{slug}', [DashboardController::class, 'investDetail'])->name('invest.detail');
    Route::get('FortifyFunds/user/invest-more', [DashboardController::class, 'investMore'])->name('invest.more');
    Route::get('FortifyFunds/user/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('FortifyFunds/user/profile/reset', [DashboardController::class, 'profileReset'])->name('profile.reset');
    Route::get('FortifyFunds/user/top-up', [DashboardController::class, 'topUp'])->name('topUp.index');
    Route::get('FortifyFunds/user/top-up/minimarket', [DashboardController::class, 'mini'])->name('topUp.minimarket');
    Route::post('FortifyFunds/user/top-up/minimarket', [DashboardController::class, 'topUpMini'])->name('topUp');
    Route::get('FortifyFunds/user/withdraw', [DashboardController::class, 'withdraw'])->name('withdraw');
    Route::post('FortifyFunds/user/withdraw', [DashboardController::class, 'withdrawTake'])->name('take');
    Route::get('FortifyFunds/user/transfer-search', [DashboardController::class, 'transfer'])->name('transfer');
    Route::get('FortifyFunds/user/transfer/search-user', [DashboardController::class, 'searchUser'])->name('user.search');
    Route::get('FortifyFunds/user/transfer/send/{user_id}', [DashboardController::class, 'transferSend'])->name('transfer.send');
    Route::post('FortifyFunds/user/transfer/send/proses', [DashboardController::class, 'processTransfer'])->name('transfer.process');
    Route::get('FortifyFunds/user/history', [DashboardController::class, 'transactionHistory'])->name('history');
    Route::post('FortifyFunds/user/contact/suggestion-send', [DashboardController::class, 'suggestion'])->name('suggestion');
    Route::get('FortifyFunds/user/transfer/send', [DashboardController::class, 'adminFee'])->name('adminFee');
});
Route::get('FortifyFunds/user/login', [LoginController::class, 'login'])->name('login');
Route::post('FortifyFunds/user/login/register', [LoginController::class, 'input'])->name('input');
Route::post('/save-pin', [LoginController::class, 'savePin'])->name('save-pin');
Route::post('FortifyFunds/user/login', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('FortifyFunds/user/forgot-password', [LoginController::class, 'forgotpassword'])->middleware('guest')->name('forgot');
Route::post('FortifyFunds/user/forgot-password', [LoginController::class, 'resetpassword'])->middleware('guest')->name('reset');
Route::get('FortifyFunds/user/reset-password/{token}', [LoginController::class, 'passwordreset'])->middleware('guest')->name('password.reset');
Route::post('FortifyFunds/user/reset-password', [LoginController::class, 'password'])->middleware('guest')->name('password');



// ROUTE MIDDLEWARE ADMIN
Route::middleware(['auth:admins'])->group(function () {
    Route::get('FortifyFunds/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('FortifyFunds/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('FortifyFunds/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('FortifyFunds/admin/profile/change', [AdminController::class, 'adminReset'])->name('profile.reset');
    Route::get('FortifyFunds/admin/user', [AdminController::class, 'adminUser'])->name('admin.user');
    Route::post('FortifyFunds/admin/user/{id}/block', [AdminController::class, 'block'])->name('user.block');
    Route::post('FortifyFunds/admin/user/{id}/unblock', [AdminController::class, 'unblock'])->name('user.unblock');
    Route::get('FortifyFunds/admin/article', [AdminController::class, 'adminArticle'])->name('admin.article');
    Route::get('FortifyFunds/admin/article-create', [AdminController::class, 'articleCreate'])->name('article.create');
    Route::post('FortifyFunds/admin/article-create', [AdminController::class, 'createArticle'])->name('create.article');
    Route::get('ForifyFunds/admin/article/edit-article/{slug}', [AdminController::class, 'editArticle'])->name('edit.article');
    Route::get('FortifyFunds/admin/contact', [AdminController::class, 'adminContact'])->name('admin.contact');
    Route::post('FortifyFunds/admin/contact', [AdminController::class, 'adminUpdate'])->name('admin.update');
    Route::get('FortifyFunds/admin/invest-index', [AdminController::class, 'adminInvest'])->name('admin.invest');
    Route::get('FortifyFunds/admin/invest-create', [AdminController::class, 'adminMarket'])->name('admin.market');
    Route::post('FortifyFunds/admin/invest-store', [AdminController::class, 'investCreate'])->name('invest.create');
});
Route::get('FortifyFunds/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('FortifyFunds/admin/login', [AdminController::class, 'adminActionLogin'])->name('admin.action');
