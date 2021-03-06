<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

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
//dd(TestController::class);
Route::post('/posts',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('/posts', [PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show')->middleware('auth');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
//route group
// Route::group(['middleware'=>['auth']],function(){
//    Route::get('/posts', [PostController::class,'index'])->name('posts.index');
//    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
//    Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
//    Route::post('/posts',[PostController::class,'store'])->name('posts.store');
     
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/tags',[TagController::class,'store'])->name('tags.store')->middleware('auth');
Route::get('/tags', [TagController::class,'index'])->name('tags.index')->middleware('auth');

