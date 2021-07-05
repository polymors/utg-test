<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;

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

Route::get('/', [Product::class, 'get_list']);
Route::get('/product_create', [Product::class, 'create'])->name('create_product');
Route::post('/product_create', [Product::class, 'add'])->name('add_product');
Route::get('/product/{slug}', [Product::class, 'get'])->name('product');

