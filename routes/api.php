<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;
 
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
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
