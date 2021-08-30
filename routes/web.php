<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UfidaController;
use App\Http\Controllers\AdminController;

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
//admin
  Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
  Route::post('admin/login',[AdminController::class,'dologin']);
Route::group(['namespace'=>'adminPage','middleware'=>'auth:web'],function(){
  Route::get('admin/create/{userId}',[AdminController::class,'create']);
  Route::post('admin/create/{userId}',[AdminController::class,'insert']);
  Route::post('admin/logout',[AdminController::class,'doLogout']);
  Route::get('admin/{userId}',[AdminController::class,'homePage']);
  Route::get('admin/ShowUsers/{userId}',[AdminController::class,'ShowUsersAdmin']);
  Route::post('admin/ShowUsers/{userId}/{selectedUserId}',[AdminController::class,'ShowUsersMakeAdmin']);
  Route::post('admin/online/products/{selectedProductId}/{userId}',[AdminController::class,'ShowHideProducts']);
  Route::post('admin/ShowReviewAdmin/{reviewId}/{userId}',[AdminController::class,'HideShowReview']);
  Route::get('admin/ShowReviewAdmin/{userId}',[AdminController::class,'ShowReviewAdmin']);
  Route::get('admin/ShowOrders/{userId}',[AdminController::class,'ShowOrders']);
  Route::get('admin/online/products/{userId}',[AdminController::class,'index']);
  Route::get('admin/{productCategory}/{userId}',[AdminController::class,'ShowProductsWithCat']);
  Route::get('admin/online/products/edit/{productId}/{userId}',[AdminController::class,'ShowEditProduct']);
  Route::post('admin/online/products/edit/{productId}/{userId}',[AdminController::class,'EditProduct']);
  Route::get('admin/showcategories/{userId}',[AdminController::class,'showcategories']);
  Route::get('admin/online/outOfStock/{userId}',[AdminController::class,'OutOfStockProducts']);
  Route::get('/admin/Create/Category/{userId}',[AdminController::class,'CreateCategory']);
  Route::post('/admin/Create/Category/{userId}',[AdminController::class,'DoCreateCategory']);
});



Route::get('/online/products/{userId}',[UfidaController::class,'index']);
Route::get('/online/products',[UfidaController::class,'ShowProductsOnly']);
Route::post('/products/{productId}/{userId}',[UfidaController::class,'addcartToUser']);

Route::get('/online/ShowProducts/{productId}/{userId}',[UfidaController::class,'ShowDescription']);
Route::post('/online/ShowProducts/{productId}/{selecedProductId}/{userId}',[UfidaController::class,'addcartToShowDescription']);
Route::get('/online/showcart/{userId}',[UfidaController::class,'ShowCartUfida']);
Route::post('/online/showcart/{userId}',[UfidaController::class,'PostCart']);
Route::get('online/products/Order/{userId}',[UfidaController::class,'ShowOrder']);
Route::post('/online/products/Order/{userId}',[UfidaController::class,'CreateOrder']);
Route::post('products/Order/transaction/{userId}/{orderId}',[UfidaController::class,'InsertIntoTran']);
Route::get('/products/review/{productId}/{userId}',[UfidaController::class,'ShowReview']);
Route::get('/products/review/{productId}',[UfidaController::class,'ShowReviewOnly']);
Route::post('/products/review/{productId}/{userId}',[UfidaController::class,'SubmitWriteReview']);
Route::post('online/logout',[ufidaController::class,'doLogout']);

Route::get('online/login',[UfidaController::class,'login']);
Route::post('online/Register',[UfidaController::class,'Register']);
Route::post('online/login',[UfidaController::class,'doLogin']);
Route::get('/HomePage/{userId}',[ufidaController::class,'HomePage']);
Route::post('/HomePage/{productId}/{userId}',[UfidaController::class,'addcartToUserHomePage']);
Route::post('/HomePage/category/{divId}/{productId}/{categoryId}/{userId}',[UfidaController::class,'addcartToUserProductPage']);
Route::get('/HomePage/category/{categoryId}',[UfidaController::class,'productPage']);
Route::get('/HomePage/category/ShowCart/{userId}',[UfidaController::class,'ShowCartUfida']);
Route::post('/HomePage/category/ShowCart/{userId}',[UfidaController::class,'PostCartUfida']);
Route::post('/HomePage/category/ShowCart/{cartItemId}/{userId}',[UfidaController::class,'DeleteCart']);
Route::get('/HomePage/category/ConfirmCart/{userId}',[UfidaController::class,'ConfirmCartUfida']);

Route::get('/HomePage/product/description',function(){
  return view('userInterface.description');
});

Auth::routes();
Route::get('/admin', [\App\Http\Controllers\Admin::class, 'login'])->name('login');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
