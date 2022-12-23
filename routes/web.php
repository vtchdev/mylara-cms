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
Route::post('/add_blog_post' , [AdminController::class , 'add_blog_post']);
Route::get('/delete_blog_post/{id}' , [AdminController::class , 'delete_blog_post']);
Route::get('/edit_blog_post/{id}' , [AdminController::class , 'edit_blog_post']);
Route::post('/edit_blog_post_confirm/{id}' , [AdminController::class , 'edit_blog_post_confirm']);


Route::get('/search', 'App\Http\Controllers\AdminController@admin_search')->name('admin_search');

// BLOG CATEGORY ROUTE
Route::get('/blog/category' , [AdminController::class , 'blog_category_page']);
Route::post('/add_category_blog' , [AdminController::class , 'add_category_blog']);
Route::get('/delete_blog_category/{id}' , [AdminController::class , 'delete_blog_category']);
Route::get('/edit_blog_category/{id}' , [AdminController::class , 'edit_blog_category']);
Route::post('/edit_blog_category_confirm/{id}' , [AdminController::class , 'edit_blog_category_confirm']);

Route::get('/blog/category/{id}' , [AdminController::class , 'blog_category_page_show']);

// PAGES ROUTE
Route::get('/pages' , [AdminController::class, 'Page_index']);
Route::get('/pages/add' , [AdminController::class, 'page_admin_add']);
Route::post('/add_page_confirm' , [AdminController::class , 'add_page_confirm']);




});
