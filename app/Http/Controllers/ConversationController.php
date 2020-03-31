<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Conversation;
use DB;


class ConversationController extends Controller
{
    public function createConversationReply(Request $request){
        $conversation = Conversation::create($request->all());
        return response()->json($conversation);
    }

    public function updateConversationReply(Request $request, $id){
        $conversation  = DB::table('conversations')->where('id',$request->input('id'))->get();
        $conversation->user_one = $request->input('user_one');
        $conversation->user_two = $request->input('user_two');
        $conversation->ip = $request->input('ip');
        $conversation->time = $request->input('time');
        $conversation->created_at = $request->input('created_at');
        $conversation->updated_at = $request->input('updated_at');
        $conversation->save();
        $response["conversations"] = $conversation;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function deleteConversationReply($id){
        $conversation  = DB::table('conversations')->where('id',$id)->get();
        $conversation->delete();
        return response()->json('Removed successfully.');
    }

    public function index(){
        $conversation  = Conversation::all();
        $response["conversations"] = $conversation;
        $response["success"] = 1;
        return response()->json($response);
    }

}
