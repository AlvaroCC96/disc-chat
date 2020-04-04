<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

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

Route::resource('conversations','ConversationController');
Route::get('registerUser', function (Request $request){
    return (new App\Http\Controllers\Auth\RegisterController)->register($request);
});

//lo de abajo lo comente
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
