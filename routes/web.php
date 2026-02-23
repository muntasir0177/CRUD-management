<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
   
Route::get('/', function () {
    return view('home');
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    // resource controller contains all the mothods for the resource like index, create, store, show, edit, update, destroy
    Route::resource('roles', RoleController::class); 
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
});