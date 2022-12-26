<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index']);

Route::get('about', function () {
    return view('about', [
        'title' => 'About',
    ]);
});

Route::get('posts/', [PageController::class, 'allPosts']);
Route::get('post/{title:slug}', [PageController::class, 'viewPost']);
Route::get('category/{category:slug}', [PageController::class, 'byCategory']);
Route::get('user/{user:name}', [PageController::class, 'byUser']);

// Route::get('category/{cat:slug}', [PageController::class, 'theCategory']);