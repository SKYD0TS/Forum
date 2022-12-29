<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('ah', [
        'title' => 'About',
    ]);
});

Route::get('posts/', [PageController::class, 'allPosts']);
Route::get('post/{title:slug}', [PageController::class, 'viewPost']);
Route::get('category/{category:slug}', [PageController::class, 'byCategory']);
Route::get('user/{user:username}', [PageController::class, 'byUser']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginUser']);

Route::post('/logout', [LoginController::class, 'logoutUser']);
// Route::post('/login', function () {
//     echo request();
// });

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'registerUser']);


Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');


Route::get('/dashboard/post/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts',DashboardPostController::class)->middleware('auth');


