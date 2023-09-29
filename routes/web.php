<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WishlistController;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewproduct']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('load-cart-data', [App\Http\Controllers\Frontend\CartController::class, 'cartcount']);
Route::post('/add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addProduct']);
Route::post('delet-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'destroyproduct']);
Route::put('/update-cart', [App\Http\Controllers\Frontend\CartController::class, 'updateCart']);
Route::post('/add-to-wishlist', [App\Http\Controllers\Frontend\wishlistController::class, 'addwishlist']);
Route::post('delete-item', [App\Http\Controllers\Frontend\WishlistController::class, 'destroyproduct']);
Route::post('load-wislist-data', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlistcount']);


Route::middleware( ['auth'])->group (function () {
  Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);
  Route::get('checkout',[CheckoutController::class,'index']);
  Route::post('place-order',[CheckoutController::class,'placeOrder']);
  Route::get('my-order',[UserController::class , 'index']);
  Route::get('view-order/{id}',[UserController::class , 'view']);
  Route::get('wishlist',[WishlistController::class , 'index']);


});
Route::middleware( ['auth','isAdmin'])->group (function () {

   Route::get('/dashboard','App\Http\Controllers\Admin\FrontendController@index');
   Route::get('categories','App\Http\Controllers\Admin\CatController@index');
   Route::get('add-category','App\Http\Controllers\Admin\CategoryController@add');
   Route::post('insert-category','App\Http\Controllers\Admin\CategoryController@insert');
   Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
   Route::put('/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
   Route::get('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

   Route::get('products','App\Http\Controllers\Admin\ProductController@index');
   Route::get('add-product','App\Http\Controllers\Admin\ProductController@add');
   Route::post('insert-product','App\Http\Controllers\Admin\ProductController@insert');
   Route::get('/edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
   Route::put('/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
   Route::get('delete-product/{id}', [App\Http\Controllers\Admin\productController::class, 'destroy']);

   Route::get('orders',[OrderController::class, 'index']);
   Route::get('admin/view-order/{id}',[OrderController::class , 'view']);
   Route::put('update-order/{id}',[OrderController::class , 'update']);
   Route::get('order-history',[OrderController::class , 'orderhistory']);

   Route::get('users', [DashboardController::class, 'users']);
   Route::get('view-users/{id}', [DashboardController::class, 'viewuser']);

 });