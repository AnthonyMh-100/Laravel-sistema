<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login' , [LoginController::class ,'login']);
Route::post('/login' , [LoginController::class ,'auth']);



Route::get('/home' , [LoginController::class ,'home'])->middleware('login')->name('home');
Route::get('/cart' , [ProductController::class ,'cart'])->middleware('login')->name('cart');
Route::post('/cart' , [ProductController::class ,'addCart'])->middleware('login')->name('addCart');
Route::get('/cart/generate' , [ProductController::class ,'generateSale'])->middleware('login')->name('generateSale');
Route::get('/products' , [ProductController::class ,'viewProducts'])->middleware('login')->name('viewProducts');
Route::post('/delete' , [ProductController::class ,'deleteProductCart'])->middleware('login')->name('deleteProductCart');
Route::post('/filtar',[LoginController::class,'home'])->middleware('login')->name('filtrar');
Route::get('/edit-product',[ProductController::class,'editProduct'])->middleware('login')->name('editProduct');
Route::post('/update-product',[ProductController::class,'updateProduct'])->middleware('login')->name('updateProduct');
Route::get('/delete-product',[ProductController::class,'deleteProduct'])->middleware('login')->name('deleteProduct');
Route::get('/cart/generate-pdf' , [ProductController::class ,'generatePdf'])->middleware('login')->name('generatePdf');
Route::get('/ventas-pdf' , [ProductController::class ,'ventasPdf'])->middleware('login')->name('ventasPdf');
Route::post('/ventas-pdf-user' , [ProductController::class ,'userPdf'])->middleware('login')->name('userPdf');
Route::get('/user-ventas-pdf' , [ProductController::class ,'userVentasPdf'])->middleware('login')->name('userVentasPdf');


Route::get('/dashborad' , [LoginController::class ,'dashborad'])
->middleware('auth.admin')
->name('dashborad');

Route::post('/home/comments' , [LoginController::class ,'comentar'])->middleware('login')->name('comentar');




Route::get('/register' , [LoginController::class ,'register'])->name('register');


Route::post('/register' , [LoginController::class ,'registerUser']);
Route::post('/logout', [LoginController::class , 'logout'])->name('logout');
Route::post('/dashborad/addRole', [LoginController::class , 'addrole'])->name('addrole');
Route::get('/dashborad/editar' , [LoginController::class ,'editUser'])->name('editUser');
Route::post('/dashborad/editar' , [LoginController::class ,'updateUser'])->name('updateUser');
Route::get('/dashborad/delete/{id_delete}', [LoginController::class ,'deleteUser'])->name('deleteUser');
Route::get('/dashborad/addProduct', [LoginController::class ,'product'])->name('product');
Route::post('/dashborad/addProduct/createProduct', [ProductController::class ,'add_product'])->name('add_product');

