<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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



Route::get('/',[HomeController::class,'index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('post/{slug}',[PostController::class,'showPost'])->name('show.post');
Route::post('post/addComment',[PostController::class,'addComment'])->name('add.comment');
Route::get('about',AboutController::class)->name('about');
Route::get('contact',[ContactController::class,'show'])->name('show.contact');
Route::post('contact',[ContactController::class,'store'])->name('store.contact');
