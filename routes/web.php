<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OverViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
//4 type of controller php artisan make:controller -r
//Resource
//Invokable
//Plain
//API

Route::view('/', 'overview');

Route::group(['namespace' => 'Admin', 'middleware' => [], 'prefix' => 'admin/manage'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});

Route::group(['prefix' => 'manage', 'middleware' => ['auth']], function () {
    Route::resource('products', \ProductController::class);
    Route::get('/overview', \OverViewController::class)->name('overview');

    Route::resource('categories', \CategoryController::class);


    //Route::post('/checkouts/', [CheckoutController::class, 'checkout'])->name('checkouts');
});

//Store front

Route::get('/', [ProductController::class, 'show']);
Route::get('/checkouts/', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkouts', [CheckoutController::class, 'store'])->name('checkouts');




//user login & logout
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');

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
