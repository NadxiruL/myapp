<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;

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


Route::get('/dashboard',[PostController::class, 'index'])->name('posting');

Route::post('/posting',[BlogController::class, 'store'])->name('blog-insert');

//dapatkan data untuk 1 posting blog. {id} akan di pass ke pada parameter dalam function show .
Route::get('/mypost/{id}',[PostController::class, 'showSatuSahaja'])->name('mypost');

//dapatkan semua data untuk posting.
Route::get('/myposts',[PostController::class, 'showSemua'])->name('mypost');

//ambik data untuk edit sahaja.
Route::get('/myposts/{edit}/edit',[PostController::class, 'edit'])->name('post-edit');

//submit dari form edit.
Route::post('/mypost/{id}',[PostController::class, 'update'])->name('post-update');

Route::delete('/mypost/{id}',[PostController::class, 'delete'])->name('post-delete');

Route::get('/',[BlogController::class, 'index'])->name('blog');


Route::get('/about',[AboutController::class, 'index'])->name('about');







