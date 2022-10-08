<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\publishersController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PurchaseController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});



// SEARCH

Route::get('/categories/search' , [categoriesController::class , 'search']);
Route::get('/publishers/search' , [publishersController::class , 'search']);
Route::get('/authors/search' , [AuthorsController::class , 'search']);


// GALLERY

Route::get('/' , [GalleryController::class , 'index'])->name('gallery.index');
Route::get('/search' , [GalleryController::class , 'search'])->name('gallery.search');


// BOOK

Route::get('/book/{book}' , [BooksController::class , 'showBook']);
Route::post('book/{book}/rate' , [BooksController::class , 'rate']);


// CATEGORIES

Route::get('/categories' , [categoriesController::class, 'indexCategories']);
Route::get('/categories/{category}' , [categoriesController::class, 'showCategories']);


// PUBLISHERS

Route::get('/publishers' , [publishersController::class, 'indexPublishers']);
Route::get('/publishers/{publisher}' , [publishersController::class, 'showPublishers']);


// Authors

Route::get('/authors' , [AuthorsController::class, 'indexAuthors']);
Route::get('/authors/{author}' , [AuthorsController::class, 'showAuthors']);


// Admin

Route::prefix('/admin')->middleware('can:update-books')->group(function(){
    Route::get('/' , [AdminController::class , 'index']);
    Route::resource('/books' , BooksController::class);
    Route::resource('/categories' , categoriesController::class);
    Route::resource('/publishers' , publishersController::class);
    Route::resource('/authors' , AuthorsController::class);
    Route::resource('/users' , UsersController::class)->middleware('can:update-users');
    Route::get('/purchases' , [PurchaseController::class,'adminProduct'])->middleware('can:update-users');
});


// Card_Bought

Route::POST('/cart',[CardController::class,'addToCart'])->name('cart.add');
Route::get('/cart',[CardController::class,'viewCart']);
Route::post('/removeOne/{book}' ,[CardController::class , 'removeOne'])->name('cart.removeOne');
Route::post('/removeAll/{book}' ,[CardController::class , 'removeAll'])->name('cart.removeAll');


// credit cart

Route::get('/checkout' , [PurchaseController::class , 'creditCheckout']);
Route::post('/checkout' , [PurchaseController::class , 'purchase']);

// my purchases 

Route::get('/purchases' , [PurchaseController::class , 'MyProduct']);
