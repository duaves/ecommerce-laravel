<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

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

Route::get('/catalog/index', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/category/{slug}', [CatalogController::class, 'category'])->name('catalog.category');
Route::get('/catalog/brand/{slug}', [CatalogController::class, 'brand'])->name('catalog.brand');
Route::get('/catalog/product/{slug}', [CatalogController::class, 'product'])->name('catalog.product');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
