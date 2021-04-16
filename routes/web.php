<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\People\PeopleController;
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
    return view('landing-page');
})->name('home');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/process', [AuthController::class, 'processRegister'])->name('register.process');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/process', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'session'], function(){

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('news', [AdminController::class, 'newsIndex'])->name('news.index');
        Route::get('news/create', [AdminController::class, 'newsCreate'])->name('news.create');
        Route::post('news', [AdminController::class, 'newsStore'])->name('news.store');
        Route::get('news/{news}', [AdminController::class, 'newsShow'])->name('news.show');
        Route::get('news/{news}/edit', [AdminController::class, 'newsEdit'])->name('news.edit');
        Route::patch('news/{news}', [AdminController::class, 'newsUpdate'])->name('news.update');  
        Route::delete('news/{news}', [AdminController::class, 'newsDelete'])->name('news.delete');  
    });

    Route::get('news', [PeopleController::class, 'news'])->name('news.all');
});
