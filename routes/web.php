<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SeekerController;
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

Route::resource('login', LoginController::class);

Route::middleware('auth')->group(function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('dashboard', DashboardController::class);
    
    Route::resource('admin', AdminController::class);
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
        Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
    });
    
    Route::resource('company', CompanyController::class);
    Route::name('company.')->prefix('employer')->group(function () {
        Route::get('change-status/{id}', [CompanyController::class, 'changeStatus'])->name('changestatus');
    });
    
    Route::resource('employer', EmployerController::class);
    Route::name('employer.')->prefix('employer')->group(function () {
        Route::post('/update/{id}', [EmployerController::class, 'update'])->name('update');
    });
    
    Route::resource('seeker', SeekerController::class);
    Route::name('seeker.')->prefix('seeker')->group(function () {
        Route::post('/update/{id}', [SeekerController::class, 'update'])->name('update');
    });
    
    Route::resource('package', PackageController::class);
    Route::name('package.')->prefix('package')->group(function () {
        Route::post('/update/{id}', [PackageController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [PackageController::class, 'destroy'])->name('destroy');
    });
    Route::resource('news', NewsController::class);
    Route::name('news.')->prefix('news')->group(function () {
        Route::post('/update/{id}', [NewsController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
    });
});
