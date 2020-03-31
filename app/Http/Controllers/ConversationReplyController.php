<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConversationReply;
use DB;

class ConversationReplyController extends Controller
{
    public function createConversation(Request $request){
        $conversation_replies = ConversationReply::create($request->all());
        return response()->json($conversation_replies);
    }

    public function updateConversation(Request $request, $id){
        $conversation_replies  = DB::table('conversations_replies')->where('id',$request->input('id'))->get();
        $conversation_replies->reply = $request->input('reply');
        $conversation_replies->user_id_fk = $request->input('user_id_fk');
        $conversation_replies->ip = $request->input('ip');
        $conversation_replies->time = $request->input('time');
        $conversation_replies->latitude = $request->input('latitude');
        $conversation_replies->longitude = $request->input('longitude');
        $conversation_replies->conversation_id_fk = $request->input('conversation_id_fk');
        $conversation_replies->created_at = $request->input('created_at');
        $conversation_replies->updated_at = $request->input('updated_at');
        $conversation_replies->save();
        $response["conversations_replies"] = $conversation_replies;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function deleteConversation($id){
        $conversation_replies  = DB::table('conversations_replies')->where('id',$id)->get();
        $conversation_replies->delete();
        return response()->json('Removed successfully.');
    }

    public function index(){
        $conversation_replies  = ConversationReply::all();
        $response["conversations_replies"] = $conversation_replies;
        $response["success"] = 1;
        return response()->json($response);
    }

}
