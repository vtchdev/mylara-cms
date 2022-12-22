<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



// ADMIN ROUTE
Route::get('/admin' , [AdminController::class , 'admin_redict']);

// ADMIN BLOG PAGE ROUTE
Route::get('/blog-page' , [AdminController::class , 'blog_page']);
Route::get('/blog/add' , [AdminController::class , 'blog_page_add']);

Route::get('/blog/category' , [AdminController::class , 'blog_category_page']);
Route::post('/add_category_blog' , [AdminController::class , 'add_category_blog']);
Route::get('/delete_blog_category/{id}' , [AdminController::class , 'delete_blog_category']);


});