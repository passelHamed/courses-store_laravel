<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExplainersController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\VideosController;
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

Route::get('/explainers/search' , [ExplainersController::class , 'search']);


// GALLERY

Route::get('/' , [GalleryController::class , 'index'])->name('gallery.index');
Route::get('/search' , [GalleryController::class , 'search'])->name('gallery.search');


// courses

Route::get('/courses/{course}' , [CoursesController::class , 'ShowCourse']);
Route::post('courses/{course}/rate' , [CoursesController::class , 'rate']);


// explainers

Route::get('/explainers' , [ExplainersController::class, 'indexExplainers']);
Route::get('/explainers/{explainer}' , [ExplainersController::class, 'showExplainers']);


// Admin

Route::prefix('/admin')->middleware('can:update-books')->group(function(){
    Route::get('/' , [AdminController::class , 'index']);
    Route::resource('/courses' , CoursesController::class);
    // Route::resource('/courses/{course}/videos' , VideosController::class);
    Route::get('/courses/{course}/videos' , [VideosController::class,'index']);
    Route::get('/courses/{course}/videos/create' , [VideosController::class,'create']);
    Route::post('/courses/{course}/videos' , [VideosController::class,'store']);
    Route::get('/courses/videos/{video}' , [VideosController::class,'show']);
    Route::resource('/explainers' , ExplainersController::class);
    Route::resource('/users' , UsersController::class)->middleware('can:update-users');
    Route::get('/purchases' , [PurchaseController::class,'adminProduct'])->middleware('can:update-users');
});


// Card_Bought

Route::post('/cart',[CardController::class,'addToCart'])->name('cart.add');
Route::get('/cart',[CardController::class,'viewCart']);
Route::post('/remove/{Course}' ,[CardController::class , 'remove'])->name('cart.remove');


// credit cart

Route::get('/checkout' , [PurchaseController::class , 'creditCheckout'])->middleware('auth');
Route::post('/checkout' , [PurchaseController::class , 'purchase']);

// my purchases 

Route::get('/purchases' , [PurchaseController::class , 'MyProduct'])->middleware('auth');


// videos

Route::get('/courses/{course}/videos',[VideosController::class , 'indexVideos'])->middleware('can:update-video');
Route::get('/courses/videos/{video}',[VideosController::class , 'showVideos'])->middleware('can:update-video');
