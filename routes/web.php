<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/blog',[PagesController::class,'blog'])->name('blog');

Route::post('/khaltiverify',[PaymentController::class,'khaltiverify'])->name('khaltiverify');
Route::get('/khalti', [PaymentController::class, 'khalti'])->name('khalti');

// Route::get('/cart',[PagesController::class,'cart'])->name('cart');

Route::get('/shop',[PagesController::class,'shop'])->name('shop');
Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');
Route::get('/brandproduct/{id}',[PagesController::class,'brandproduct'])->name('brandproduct');

Route::get('/viewproduct/{product}',[PagesController::class,'viewproduct'])->name('viewproduct');

Route::get('/userlogin',[PagesController::class,'userlogin'])->name('userlogin');

Route::get('/userregister',[UserController::class,'userregister'])->name('user.register');
Route::post('/userregister',[UserController::class,'userstore'])->name('user.store');
Route::get('/search',[PagesController::class,'search'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','isadmin'])->name('dashboard');


Route::middleware(['auth'])->group(function(){
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('/cart/{id}/delete',[CartController::class,'delete'])->name('cart.delete');
    Route::post('/cart/{id}/update',[CartController::class,'update'])->name('cart.update');
    Route::get('/checkout',[CartController::class,'checkout'])->name('cart.checkout');

     //User Profile 
    Route::get('/myprofile',[UserController::class,'userprofile'])->name('myprofile');
    Route::get('/editprofile/{id}',[UserController::class,'editprofile'])->name('editprofile');
    Route::post('/updateprofile', [UserController::class, 'userupdate'] )-> name ('userprofile.update');

   
   // Example route in Laravel
Route::get('/get-products-by-price',[ProductController::class,'getProductsByPrice'])->name('getproduct');

    


    Route::get('/myorder',[OrderController::class,'index'])->name('order.index');
        
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
});




Route::middleware(['auth' ,'isadmin'])->group(function () {


    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard'); 
    Route::post('/dashboard/changemonth',[DashboardController::class,'changemonth'])->name('changemonth'); 
    Route::post('/dashboard/month',[DashboardController::class,'month'])->name('month'); 

    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
    // Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::post('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');



    //orderdetails
    Route::get('/order',[OrderController::class,'details'])->name('order.details');
    Route::get('/order/{id}/orderdetails',[OrderController::class,'orderdetails'])->name('order.orderdetails');
    Route::get('/order/{id}/edit',[OrderController::class,'edit'])->name('order.edit');
    Route::post('/order/{id}/update',[OrderController::class,'update'])->name('order.update');
    Route::get('/order/status/{id}/{status}',[OrderController::class,'status'])->name('order.status');
    Route::get('order/{id}/delete',[OrderController::class,'delete'])->name('order.delete');
  
    //User Deatils
    Route::get('/userdetails',[UserController::class,'userdetails'])->name('user.userdetails');
    Route::get('/create',[UserController::class,'createadmin'])->name('user.createadmin');


    //Admin
    Route::post('/user/store',[UserController::class,'userstore'])->name('users.store');
    Route::get('/user/{id}/delete',[UserController::class,'destroy'])->name('users.delete');
    // Route::get('/adminprofile',[UserController::class,'adminprofile'])->name('adminprofile');
    Route::get('/adminprofile',[UserController::class,'adminprofile'])->name('adminprofile.index');
    
    Route::get('/adminprofile/edit/{id}',[UserController::class,'adminedit'])->name('adminprofile.edit');

    
    Route::get('/brand',[BrandController::class,'index'])->name('brand.index');
    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/{id}/edit',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/{id}/update',[BrandController::class,'update'])->name('brand.update');
    Route::post('/brand/destroy',[BrandController::class,'destroy'])->name('brand.destroy');


    //Product
    Route::middleware('auth')->group(function(){
        Route::get('/product',[ProductController::class,'index'])->name('product.index');
        Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
        Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
        Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
        Route::post('/product/destroy',[ProductController::class,'destroy'])->name('product.destroy');
    });


   
});


Route::middleware(['auth' ])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';