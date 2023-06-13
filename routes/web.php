<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\TestController;
use GuzzleHttp\Middleware;
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
Route::group(["prefix"=>"/", "middleware"=>"test"], function(){
    Route::get("/test1", [TestController::class, "test1"]);
    Route::get("/test2", [TestController::class, "test1"]);
});

Route::group(["prefix"=>"/login", "middleware"=>"checklogin"], function(){
    Route::get("/", [AuthController::class, "getLogin"]);
    Route::post("/", [AuthController::class, "postLogin"]);
});

Route::group(["prefix"=>"/admin", "middleware"=>"checkadmin"], function(){

    Route::get("/", [AdminController::class, "index"]);
    Route::get("/logout", [AdminController::class, "logout"]);

    Route::group(["prefix"=>"product"], function(){
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/create", [ProductController::class, "create"]);
        Route::post("/store", [ProductController::class, "store"]);
        Route::get("/edit", [ProductController::class, "edit"]);
        Route::post("/update", [ProductController::class, "update"]);
        Route::get("/delete", [ProductController::class, "delete"]);
    });

    Route::group(["prefix"=>"category"], function() {
        Route::get("/", [CategoryController::class, "index"]);
        Route::get("/edit", [CategoryController::class, "edit"]);
    });

    Route::group(["prefix"=>"/user"], function(){
        Route::get("/", [UserController::class, "index"]);
        Route::get("/create", [UserController::class, "create"]);
        Route::get("/edit", [UserController::class, "edit"]);
        Route::get("/delete", [UserController::class, "delete"]);
        Route::post("/update", [UserController::class, "update"]);
    });
});



