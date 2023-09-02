<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'jwt.auth'], function () {

        Route::group(['prefix' => 'store'], function () {
            Route::post('list', 'StoreController@listAction');
            Route::post('detail', 'StoreController@detailAction');
            Route::post('create', 'StoreController@createAction');
            Route::post('update', 'StoreController@updateAction');
            Route::post('delete', 'StoreController@deleteAction');
        });
        
        Route::post('logout', 'AuthController@logout');
    });
});