<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

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
Route::get('registerUser','ConversationController@registerUser');   //for register user
Route::post('conversation','ConversationController@create');   //for creating conversation
Route::get('conversation/{id}','ConversationController@update'); //for updating conversation
Route::post('conversation/{id}','ConversationController@delete');  // for deleting conversation
Route::get('conversation','ConversationController@index'); // for retrieving conversation
Route::get('conversation/{idUser}','ConversationController@listConversations');
Route::get('/', function () {
    return view('welcome');
});
Route::get('registerUser', function (Request $request){
    return (new App\Http\Controllers\ConversationController)->registerUser($request);
});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
