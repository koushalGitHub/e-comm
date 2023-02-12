<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('login', function () {
    return view('login');
});

Route::post("/login", [UserController::class, 'login']);
Route::get("/home", [ProductController::class, 'index']);
Route::get("/details/{id}", [ProductController::class,'details']);
Route::post('search', [ProductController::class, 'search']);
Route::post('add_to_cart/{id}', [ProductController::class, 'add_to_cart']);
Route::get('cartList', [ProductController::class, 'cartList']);
Route::get('logout', function () {
    Session::forget('user');
    return view('login');
});
Route::get('removeCart/{id}', [ProductController::class, 'removeCart']);
Route::get('orderNow', [ProductController::class, 'orderNow']);
Route::post('orderPlace', [ProductController::class, 'orderPlace']);
Route::get('myOrders', [ProductController::class, 'myOrders']);
Route::post('register', [UserController::class, 'register']);

Route::view('/register', 'register');

// Route::post('/add_to_cart', [ProductController::class, 'addToCart']);

Route::get('/update_cart_count', [ProductController::class, 'updateCartCount']);
// Route::get('/addProduct', [ProductController::class, 'addProduct']);
// Route::post('/storeProduct', [ProductController::class, 'storeProduct']);
Route::post('/storeProduct', [ProductController::class, 'store']);

Route::get('addProduct', function () {
    return view('addProduct');
});