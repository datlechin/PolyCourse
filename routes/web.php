<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/', HomeController::class);

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

Route::get('blog', [PostController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [PostController::class, 'show'])->name('blog.show');
