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


Route::prefix('auth')->group(function(){
    Route::post('/login', 'AuthController@authenticate');
    Route::post('/register', 'AuthController@register');
    Route::get('/unauthenticated', 'AuthController@failedAuthentication')->name('login');
});

Route::middleware('auth:sanctum')->prefix('recipes')->group(function () {
    Route::get('/', 'RecipeController@index');
    Route::post('/create', 'RecipeController@store');
});
