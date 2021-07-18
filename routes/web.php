<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\ProductsController;


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

Route::get('/', [MyAuthController::class, 'index'])->name('login');
Route::get('login', [MyAuthController::class, 'index'])->name('login');
Route::post('custom-login', [MyAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [MyAuthController::class, 'registration'])->name('register-user');
Route::get('custom-registration', [MyAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('custom-registration', [MyAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [MyAuthController::class, 'signOut'])->name('signout');

# Route::get('games', [GameController::class, 'index'])->name('games')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {

    Route::resource('products', 'ProductsController');
    Route::get('products', [ProductsController::class, 'index'])->name('products');
    Route::get('dashboard', [MyAuthController::class, 'dashboard']); 

});