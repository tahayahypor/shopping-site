<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/' , [App\Http\Controllers\IndexController::class, 'index']);

Route::get('/products/', [App\Http\Controllers\ProductController::class, 'products']);

Route::get('/products/{product:slug}', [App\Http\Controllers\ProductController::class, 'single']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function()
{
    Route::post('comments' , [App\Http\Controllers\HomeController::class, 'comments'] )->name('send.comment');
});


Route::get('/category/{category:slug}' , [IndexController::class, 'show'])->name('category.show');
Route::get('search' , [SearchController::class, 'search'])->name('product.search');


Route::prefix('panel')->middleware('checkuser')->group(function()
{
    Route::get('/' , [AdminController::class, 'index'])->name('index');
    Route::resource('/users' , UserController::class);
    Route::resource('/products' , ProductController::class);
    Route::resource('/categories' , CategoryController::class);

    Route::resource('/comments' , CommentController::class)->only(['index' , 'update' , 'destroy']);

    Route::get('/comments/unapproved' , [CommentController::class , 'unapproved'])->name('unapproved.comment');

    Route::resource('orders'  , OrderController::class);

    Route::get('orders/{order}/orders' , [OrderController::class , 'payments'])->name('orders.peyments');
});



Route::post('/cart/add/{product}' , [CartController::class , 'addToCart'])->name('cart.add');

Route::get('cart' , [CartController::class , 'cart'])->name('cart');

Route::patch('/cart/quantity/change' , [CartController::class , 'quantityChange']);

Route::delete('cart/delete/{cart}' , [CartController::class , 'delete'])->name('cart.destroy');

Route::post('payment' , [PaymentController::class , 'payment'])->name('cart.payment')->middleware('auth');
Route::get('payment/callback' , [PaymentController::class , 'callback'])->name('payment.callback');
Route::get('profile' , [ProfileController::class , 'index'])->name('profile')->middleware('auth');

Route::get('profile/orders' , [ProfileController::class , 'order'])->name('profile.orders')->middleware('auth');

Route::get('profile/orders/{order}' , [ProfileController::class , 'showDetails'])->name('profile.orders.details')->middleware('auth');

Route::get('profile/orders/{order}/payment' , [ProfileController::class , 'payment'])->name('profile.orders.payment')->middleware('auth');

// Route::get('panel');
// Route::get('panel/create')->name('create');

// Route::post('panel/store);

// Route::put();
// Route::patch();
// Route::delete();

// Route::any(); 