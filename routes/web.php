<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminControllers\AdminCommentController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\AdminRoleController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminTagContoller;
use App\Http\Controllers\AdminControllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SayedController;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

use App\Http\Controllers\AdminControllers\TinyMCEController;

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


//front routes 

Route::get('/',[HomeController::class,'index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('post/{slug}',[PostController::class,'showPost'])->name('show.post');
Route::post('post/addComment',[PostController::class,'addComment'])->name('add.comment');
Route::get('about',AboutController::class)->name('about');
Route::get('contact',[ContactController::class,'show'])->name('show.contact');
Route::post('contact',[ContactController::class,'store'])->name('store.contact');
Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('categories/{category}',[CategoryController::class,'show'])->name('category.show');
Route::get('tags/{tag}',[TagController::class,'show'])->name('tag.show');

//Admin routes

Route::prefix('admin')->name('admin.')->middleware(['auth','isAdmin','checkPermission'])->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('home');
    Route::get('posts',[AdminPostsController::class,'index'])->name('posts');
    Route::get('posts/create',[AdminPostsController::class,'create'])->name('post.create');
    Route::post('posts/create',[AdminPostsController::class,'store'])->name('post.store');
    Route::get('posts/{post}/edit',[AdminPostsController::class,'edit'])->name('post.edit');
    Route::put('posts/{post}/update',[AdminPostsController::class,'update'])->name('post.update');
    Route::delete('posts/{post}/delete',[AdminPostsController::class,'delete'])->name('post.delete');

    Route::resource('categories', AdminCategoryController::class);

    Route::get('tags',[AdminTagContoller::class,'index'])->name('tags');
    Route::get('tags/{tag}/show',[AdminTagContoller::class,'show'])->name('tags.show');
    Route::delete('tags/{tag}/destroy',[AdminTagContoller::class,'destroy'])->name('tags.destroy');

    Route::get('comments',[AdminCommentController::class,'index'])->name('comments');
    Route::get('comments/create',[AdminCommentController::class,'create'])->name('comment.create');
    Route::post('comments',[AdminCommentController::class,'store'])->name('comment.store');
    Route::get("comments/{comment}/edit",[AdminCommentController::class,'edit'])->name('comment.edit');
    Route::patch('comments/{comment}/update',[AdminCommentController::class,'update'])->name('comment.update');
    Route::get('comments/{comment}/show',[AdminCommentController::class,'show'])->name('comment.show');
    Route::delete('comments/{comment}/delete',[AdminCommentController::class,'delete'])->name('comment.delete');

    Route::get('roles',[AdminRoleController::class,'index'])->name('roles');
    Route::get('roles/create',[AdminRoleController::class,'create'])->name('role.create');
    Route::post('roles',[AdminRoleController::class,'store'])->name('role.store');
    Route::get('roles/{role}/edit',[AdminRoleController::class,'edit'])->name('role.edit');
    Route::patch('roles/{role}/update',[AdminRoleController::class,'update'])->name('role.update');
    Route::delete('roles/{role}/delete',[AdminRoleController::class,'delete'])->name('role.delete');
    
    Route::post('upload_tinymce_image',[TinyMCEController::class,'upload_tinymce_image'])->name('upload_tinymce_image');
});

