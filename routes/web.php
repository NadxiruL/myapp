<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthController;
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

Route::get('/',[ProductController::class, 'show'])->name('product-view');
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::get('/overview',[ProductController::class, 'overview'])->name('overview');
Route::post('/products',[ProductController::class, 'store'])->name('products-insert');
Route::get('/allproducts',[ProductController::class, 'allproducts'])->name('allproducts');
Route::get('/category', [CategoryController::class, 'show'])->name('category-list');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category-create');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category-store');



//user login & logout
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


// Route::get('/dashboard',[PostController::class, 'index'])->name('posting');

// Route::post('/posting',[BlogController::class, 'store'])->name('blog-insert');

// //dapatkan data untuk 1 posting blog. {id} akan di pass ke pada parameter dalam function show .
// Route::get('/mypost/{id}',[PostController::class, 'displayOne'])->name('mypost');

// //dapatkan semua data untuk posting.
// Route::get('/myposts',[PostController::class, 'displayAll'])->name('mypost');

// //ambik data untuk edit sahaja.
// Route::get('/myposts/{edit}/edit',[PostController::class, 'edit'])->name('post-edit');

// //submit dari form edit.
// Route::post('/mypost/{id}',[PostController::class, 'update'])->name('post-update');

// Route::delete('/mypost/{id}',[PostController::class, 'delete'])->name('post-delete');

// Route::get('/',[BlogController::class, 'index'])->name('blog');


// Route::get('/about',[AboutController::class, 'index'])->name('about');







