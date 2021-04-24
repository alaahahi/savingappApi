<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

});

Route::get('admin/my_company', [CustomerController::class, 'my_company']);
Route::get('admin/my_orders', [CustomerController::class, 'my_orders']);
Route::get('admin/my_products', [CustomerController::class, 'my_products']);