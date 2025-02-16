<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'homepage'])->name('homepage');

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/postPage',[AdminController::class,'postPage'])->name('post_page')->middleware('admin');
Route::post('/addPost',[AdminController::class,'addPost'])->name('add_post')->middleware('admin');
Route::get('/postList',[AdminController::class,'postList'])->name('post_list')->middleware('admin');
Route::delete('/deletePost/{id}', [AdminController::class, 'deletePost'])->name('delete_post')->middleware('admin');
Route::get('/editPost/{id}',  [AdminController::class, 'editPost'])->name('edit_post')->middleware('admin');
Route::post('/updatePost/{id}', [AdminController::class, 'updatePost'])->name('update_post')->middleware('admin');
Route::get('/accept-post/{id}', [AdminController::class, 'acceptPost'])->name('accept_post')->middleware('admin');
Route::get('/reject-post/{id}', [AdminController::class, 'rejectPost'])->name('reject_post')->middleware('admin');


Route::get('/postDetails/{id}', [HomeController::class, 'postDetails'])->name('post_details');


Route::get('/createPost',[HomeController::class,'createPost'])->name('create_post')->middleware('auth');
Route::post('/storePost',[HomeController::class,'storePost'])->name('user_post')->middleware('auth');
Route::get('/userPostList',[HomeController::class,'userPostList'])->name('user_posts')->middleware('auth');
Route::get('/editUserPost/{id}',  [HomeController::class, 'editPost'])->name('edit_user_post')->middleware('auth');
Route::post('/updateUserPost/{id}', [HomeController::class, 'updatePost'])->name('update_user_post')->middleware('auth');
Route::delete('/deleteUserPost/{id}', [HomeController::class, 'deletePost'])->name('delete_user_post')->middleware('auth');



