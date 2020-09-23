<?php
Route::get('/index', [App\Http\Controllers\AdminController::class, 'index'])->name('index');  

//route brand
Route::get('brandIndex', [App\Http\Controllers\BrandController::class, 'index'])->name('brandIndex');  
Route::get('brand/create', [App\Http\Controllers\BrandController::class, 'create'])->name('brandCreate');  
Route::post('brand/store', [App\Http\Controllers\BrandController::class, 'store'])->name('brandStore');  
Route::get('brand/edit/{id}',[App\Http\Controllers\BrandController::class, 'edit']);
Route::post('brand/update/{id}',[App\Http\Controllers\BrandController::class, 'update']);
Route::get('brand/delete/{id}',[App\Http\Controllers\BrandController::class, 'destroy']);
Route::get('brand/detail/{id}',[App\Http\Controllers\BrandController::class, 'show']);

//route category
Route::get('categoriesIndex',[App\Http\Controllers\CategoryController::class, 'index']);
Route::get('category/create',[App\Http\Controllers\CategoryController::class, 'create']);
Route::post('category/store',[App\Http\Controllers\CategoryController::class, 'store']);
Route::get('category/edit/{id}',[App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('category/update/{id}',[App\Http\Controllers\CategoryController::class, 'update']);
Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class, 'destroy']);
Route::get('category/detail/{id}',[App\Http\Controllers\CategoryController::class, 'show']);

//route product
Route::get('productIndex',[App\Http\Controllers\ProductController::class, 'index']);
Route::get('product/create',[App\Http\Controllers\ProductController::class, 'create']);
Route::post('product/store',[App\Http\Controllers\ProductController::class, 'store']);
Route::get('product/edit/{id}',[App\Http\Controllers\ProductController::class, 'edit']);
Route::post('product/update/{id}',[App\Http\Controllers\ProductController::class, 'update']);
Route::get('product/delete/{id}',[App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('product/detail/{id}',[App\Http\Controllers\ProductController::class, 'show']);

//route user
Route::get('userIndex',[App\Http\Controllers\UserController::class, 'index']);
Route::get('user/create',[App\Http\Controllers\UserController::class, 'create']);
Route::post('user/store',[App\Http\Controllers\UserController::class, 'store']);
Route::get('user/edit/{id}',[App\Http\Controllers\UserController::class, 'edit']);
Route::post('user/update/{id}',[App\Http\Controllers\UserController::class, 'update']);
Route::get('user/delete/{id}',[App\Http\Controllers\UserController::class, 'destroy']);

//route user
Route::get('orderIndex',"AdminController@orderIndex");