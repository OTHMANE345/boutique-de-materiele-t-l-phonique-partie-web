<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminControllerForApi;

use App\Http\Controllers\ProductControllerOTHMANEApi34;
use App\Http\Controllers\CartControllerOthmaneApi;
use App\Http\Controllers\OrderControllerForApi;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::post('/auth/token', [TokenController::class, 'login']);
Route::post('/addnewUser', [TokenController::class, 'addUser']);

//Route::post('/auth/admin/token', [AdminController::class, 'adminLogin']);

////product Api routes
Route::get('/ShowAllProducts', [ProductControllerOTHMANEApi34::class, 'show']);
Route::get('/products/showdetails', [ProductControllerOTHMANEApi34::class, 'showdetails']);



/////////
Route::post('/addProductToCart', [App\Http\Controllers\CartControllerOthmaneApi::class, 'addProductToCart']);
Route::post('/cart', [App\Http\Controllers\CartControllerOthmaneApi::class, 'index']);
Route::post('/addOrder', [App\Http\Controllers\OrderControllerForApi::class, 'addOrder']);
Route::post('/removecart', [App\Http\Controllers\CartControllerOthmaneApi::class, 'removeProductFromCart']);

/////
Route::post('/auth/admin/token', [App\Http\Controllers\AdminControllerForApi::class, 'adminLogin']);
Route::post('/removeproduct', [App\Http\Controllers\ProductControllerOTHMANEApi34::class, 'destroy']);
Route::post('/addproduct', [App\Http\Controllers\ProductControllerOTHMANEApi34::class, 'store']);

////orders for admin
Route::get('/ShowAllorders', [App\Http\Controllers\OrderControllerForApi::class, 'index']);
Route::get('/logout', [App\Http\Controllers\AdminControllerForApi::class, 'adminLogout']);

Route::post('/removeOrder', [App\Http\Controllers\OrderControllerForApi::class, 'destroy']);
/// categories for admin
Route::get('/ShowAllcategories', [App\Http\Controllers\CategoryControllerForApi::class, 'show']);
Route::post('/removeCategory', [App\Http\Controllers\CategoryControllerForApi::class, 'destroy']);
Route::post('/addCategory', [App\Http\Controllers\CategoryControllerForApi::class, 'store']);

