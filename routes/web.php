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
Route::get('admin/my_products', [CustomerController::class, 'my_products'])->name('admin.my_products');;
Route::get('admin/approval/{id?}', [CustomerController::class, 'approval'])->name('admin.approval');
Route::get('admin/rejection/{id?}', [CustomerController::class, 'rejection'])->name('admin.rejection');
Route::get('admin/edit_product/{id?}', [CustomerController::class, 'edit_product'])->name('admin.edit_product');
Route::put('admin/edit_products/{id?}', [CustomerController::class, 'edit_products'])->name('admin.edit_products');
Route::delete('admin/remove_products/{id?}', [CustomerController::class, 'remove_products'])->name('admin.remove_products');