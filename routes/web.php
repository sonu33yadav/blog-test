<?php

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
    return view('welcome');
});

Route::get('/signUp', [App\Http\Controllers\HomeController::class, 'signUp'])->name('signUp');
Route::post('/submit', [App\Http\Controllers\HomeController::class, 'register'])->name('submit-data');
Route::post('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
// Route::middleware(['auth'])->group(function () {
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::post('/add-blog', [App\Http\Controllers\BlogController::class, 'addBlog'])->name('add-blog');
Route::get('/delete-blog/{id}', [App\Http\Controllers\BlogController::class, 'delete'])->name('delete-blog');
Route::get('/edit-blog/{id}', [App\Http\Controllers\BlogController::class, 'editBlog'])->name('edit-blog');
Route::get('/view-blog/{id}', [App\Http\Controllers\BlogController::class, 'viewblog'])->name('view-blog');
Route::post('/search', [App\Http\Controllers\BlogController::class, 'search'])->name('search');
Route::post('/update-blog', [App\Http\Controllers\BlogController::class, 'update'])->name('update-blog');
// });
