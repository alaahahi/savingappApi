<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UsersController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Orion::resource('category', CategoryController::class);
Orion::resource('card', CardController::class);
Orion::resource('cardType', CardTypeController::class);
Orion::morphToManyResource('posts', 'comments', UsersController::class);

Route::get('check_card/{moblie?}', [CustomerController::class, 'check_card'])->name('customer.check_card');
Route::get('charge_card/{cardNumber?}/{moblie?}', [CustomerController::class, 'charge_card'])->name('customer.charge_card');
Route::get('getallcart/{moblie?}/{lang?}', [CustomerController::class, 'getallcart'])->name('customer.getallcart');
Route::post('addtocart/{moblie?}', [CustomerController::class, 'addtocart'])->name('customer.addtocart');
Route::delete('removfromcart/{moblie?}/{id?}', [CustomerController::class, 'removfromcart'])->name('customer.removfromcart');
Route::delete('removallcart/{moblie?}', [CustomerController::class, 'removallcart'])->name('customer.removallcart');
Route::get('products/{ids?}/{lang?}', [CustomerController::class, 'products'])->name('customer.products');
Route::get('companies/{ids?}/{lang?}', [CustomerController::class, 'companies'])->name('customer.companies');
Route::get('search/{q?}/{lang?}', [CustomerController::class, 'search']);
Route::get('categories/{lang?}', [CustomerController::class, 'categories']);
Route::get('categories/{categoryId?}/companies/{lang?}', [CustomerController::class, 'categories_companies']);
Route::get('companies/{companyId?}/products/{lang?}', [CustomerController::class, 'companies_products']);
Route::get('home/{lang?}', [CustomerController::class, 'home']);



