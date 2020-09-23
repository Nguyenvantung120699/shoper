<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix("admin")->middleware(['auth',"check_admin"])->group(function (){
    include_once("admin.php");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');   
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop'); 
Route::get('/product_single/{id}', [App\Http\Controllers\HomeController::class, 'product_single'])->name('shop'); 

Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->middleware("auth"); ;
Route::get("/shopping/{id}",[App\Http\Controllers\CartController::class, 'pshopping'])->middleware("auth"); 
Route::post("/shopping/{id}",[App\Http\Controllers\CartController::class, 'shopping'])->middleware("auth"); 
Route::get("/clear-cart",[App\Http\Controllers\CartController::class, 'clearCart'])->middleware("auth"); 
Route::post("/check_out",[App\Http\Controllers\CartController::class, 'CheckOut'])->middleware("auth"); 
Route::get("/delete-item-cart/{id}",[App\Http\Controllers\CartController::class, 'deleteItemCart'])->middleware("auth"); 

Route::post("/create-order",[App\Http\Controllers\OrderController::class, 'Create'])->middleware("auth"); 
Route::get("/confirm-order",[App\Http\Controllers\OrderController::class, 'confirmOrder'])->middleware("auth"); 
Route::get("/list-order",[App\Http\Controllers\OrderController::class, 'showOrder'])->middleware("auth"); 



Route::get('/logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->to("/login");
 });
