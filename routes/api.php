<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('web')->prefix('user')->group( function () {
    Route::get('/', function (Request $request) {
        return auth()->user();
    });

    Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('auth.login');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('auth.register');
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');
});

Route::middleware('web')->prefix('category')->group( function () {
    Route::get('/', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('category.index');
    Route::get('/{alias}/', [\App\Http\Controllers\CategoriesController::class, 'getCategoryByAlias'])->name('category.getCategoryByAlias');
    Route::get('/{alias}/child', [\App\Http\Controllers\CategoriesController::class, 'getChildCategoriesByAlias'])->name('category.childCategoriesByAlias');
    Route::get('/{alias}/products', [\App\Http\Controllers\CategoriesController::class, 'getProductsByCategoryAlias'])->name('category.productsByCategoryAlias');
});

Route::middleware('web')->prefix('product')->group( function () {
    Route::post('/filter', [\App\Http\Controllers\ProductsController::class, 'getProductsByFilter'])->name('product.productsByFilter');
    Route::get('/{alias}', [\App\Http\Controllers\ProductsController::class, 'getProductsByCategoryAlias'])->name('product.categoriesByAlias');
    Route::get('/{alias}/filter', [\App\Http\Controllers\ProductsController::class, 'getFilterByCategoryAlias'])->name('product.filterByAlias');
});

Route::middleware('web')->prefix('basket')->group( function () {
    Route::get('/', [\App\Http\Controllers\BasketController::class, 'index'])->name('basket.index');

    Route::prefix('product')->group( function () {
        Route::get('/', [\App\Http\Controllers\BasketProductController::class, 'index'])->name('basket.product.index');
        Route::post('/', [\App\Http\Controllers\BasketProductController::class, 'store'])->name('basket.product.store');
        Route::put('/{id}', [\App\Http\Controllers\BasketProductController::class, 'update'])->name('basket.update');
        Route::delete('/{productId}', [\App\Http\Controllers\BasketProductController::class, 'destroy'])->name('basket.product.destroy');
    });
});



