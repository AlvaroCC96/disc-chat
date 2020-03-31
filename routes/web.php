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
Route::post('conversation','ConversationController@createConversation');   //for creating conversation
Route::get('conversation/{id}','ConversationController@updateConversation'); //for updating conversation
Route::post('conversation/{id}','ConversationController@deleteconversation');  // for deleting conversation
Route::get('conversation','ConversationController@index'); // for retrieving conversation

Route::post('conversationReply','ConversationReplyController@createConversationReply');   //for creating conversation
Route::get('conversationReply/{id}','ConversationReplyController@updateConversationReply'); //for updating conversation
Route::post('conversationReply/{id}','ConversationReplyController@deleteconversationReply');  // for deleting conversation
Route::get('conversationReply','ConversationReplyController@index'); // for retrieving conversation


Route::get('/', function () {
    return view('welcome');
});
