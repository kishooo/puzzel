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
  Route::post('admin/ShowOrders/{orderId}/{userId}',[AdminController::class,'paidOrder']);
  Route::post('/admin/indexPage/{orderId}/{userId}',[AdminController::class,'paidOrderIndex']);
  Route::get('admin/online/products/{userId}',[AdminController::class,'index']);
  Route::get('admin/{productCategory}/{userId}',[AdminController::class,'ShowProductsWithCat']);
  Route::get('admin/online/products/edit/{productId}/{userId}',[AdminController::class,'ShowEditProduct']);
  Route::post('admin/online/products/edit/{productId}/{userId}',[AdminController::class,'EditProduct']);
  Route::get('admin/showcategories/{userId}',[AdminController::class,'showcategories']);
  Route::get('admin/online/outOfStock/{userId}',[AdminController::class,'OutOfStockProducts']);
  Route::get('/admin/Create/Category/{userId}',[AdminController::class,'CreateCategory']);
  Route::post('/admin/Create/Category/{userId}',[AdminController::class,'DoCreateCategory']);
});

Route::get('online/login',[UfidaController::class,'login'])->name('user.login');
Route::post('online/login',[UfidaController::class,'doLogin']);
Route::get('/HomePage',[ufidaController::class,'HomePage']);
Route::get('/hh',[ufidaController::class,'HomePage']);
Route::get('/HomePage/category/products/{categoryId}',[UfidaController::class,'productPage']);
Route::get('/online/ShowProducts/{productId}',[UfidaController::class,'ShowDescription']);
Route::post('/online/ShowProducts/{productId}',[UfidaController::class,'SubmitWriteReview']);

Route::post('online/Register',[UfidaController::class,'Register']);
Route::group(['namespace'=>'userPage','middleware'=>'auth:web'],function(){
Route::post('online/logout',[UfidaController::class,'doLogout']);
Route::get('/online/products/{userId}',[UfidaController::class,'index']);
Route::get('/online/products',[UfidaController::class,'ShowProductsOnly']);
Route::post('/products/{productId}/{userId}',[UfidaController::class,'addcartToUser']);


Route::post('/online/ShowProducts/{productId}/{selecedProductId}',[UfidaController::class,'addcartToShowDescription']);
Route::post('/online/ShowProducts/MainProducts/{productId}/{selecedProductId}',[UfidaController::class,'addcartToShowDescriptionMainProduct']);
Route::get('/HomePage/category/ShowCart',[UfidaController::class,'ShowCartUfida']);
Route::post('/online/showcart',[UfidaController::class,'PostCart']);
Route::get('/HomePage/products/Order',[UfidaController::class,'ShowOrder']);
Route::post('/HomePage/products/Order',[UfidaController::class,'CreateOrder']);
Route::post('products/Order/transaction/{userId}/{orderId}',[UfidaController::class,'InsertIntoTran']);
Route::get('/products/review/{productId}/{userId}',[UfidaController::class,'ShowReview']);
Route::get('/products/review/{productId}',[UfidaController::class,'ShowReviewOnly']);
//Route::post('/products/review/{productId}/{userId}',[UfidaController::class,'SubmitWriteReview']);




//Route::get('/HomePage/{userId}',[ufidaController::class,'HomePage']);
Route::post('/HomePage/{productId}/{userId}',[UfidaController::class,'addcartToUserHomePage']);
Route::post('/HomePage/category/{divId}/{productId}/{categoryId}',[UfidaController::class,'addcartToUserProductPage']);

Route::get('/HomePage/category/ShowCart',[UfidaController::class,'ShowCartUfida']);
Route::post('/HomePage/submit/category/ShowCart',[UfidaController::class,'PostCartUfida']);
Route::post('/HomePage/category/ShowCart/{cartItemId}',[UfidaController::class,'DeleteCart']);
Route::get('/HomePage/confirm/category/ConfirmCart',[UfidaController::class,'ConfirmCartUfida']);
Route::post('/HomePage/confirm/category/ConfirmCart',[UfidaController::class,'PostConfirmCart']);
});

Route::get('/HomePage/product/description',function(){
  return view('userInterface.description');
});

Auth::routes();
Route::get('/admin', [\App\Http\Controllers\Admin::class, 'login'])->name('login');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
