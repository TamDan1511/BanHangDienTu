<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\MenuController;
use App\Http\Controllers\Api\Admin\BannerController;
use App\Http\Controllers\Api\Admin\SliderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->group(function(){
     Route::post('/user/login', [UserController::class, 'login']);
});

 
Route::group(['prefix' => 'admin', 'middleware' => 'auth:api'], function(){
     // user
    Route::post('/user/changeActive', [UserController::class, 'changeActive']);
    Route::get('/user/getUser', [UserController::class, 'getUser'])->name('getUser');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');   
    Route::resource('/user', UserController::class); 

    // category
    Route::apiResource('/category', CategoryController::class);
    Route::post('/category/changeActive', [CategoryController::class, 'changeActive']);
    Route::post('/category/move', [CategoryController::class, 'move']);
    Route::get('/getCategoryAll',[CategoryController::class, 'getCategoryAll']);

    // product
    Route::apiResource('/product', ProductController::class);

    Route::get('/getSubPicture/{id}', [ProductController::class, 'getSubPicture']);
    Route::post('/product/changeActive', [ProductController::class, 'changeActive']);
    Route::post('/product/updateCategory', [ProductController::class, 'updateCategory']);

    // menu
    Route::apiResource('/menu', MenuController::class);

    Route::post('/menu/changeActive', [MenuController::class, 'changeActive']);
    Route::post('/menu/changeOrder', [MenuController::class, 'changeOrder']);

    // banner
    Route::apiResource('/banner', BannerController::class);

    Route::post('/banner/changeActive', [BannerController::class, 'changeActive']);

     // banner
     Route::apiResource('/slider', SliderController::class);

     Route::post('/slider/changeActive', [SliderController::class, 'changeActive']);
  
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
