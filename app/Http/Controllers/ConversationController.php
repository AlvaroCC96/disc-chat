<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use http\Client\Curl\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Request\Input;
use App\Conversation;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ConversationController extends Controller
{
    public function createConversation(Request $request){
        $conversation = Conversation::create($request->all());
        return response()->json($conversation);
    }

    public function update(Request $request, $id){
        $conversation  = DB::table('conversations')->where('id',$request->input('id'))->get();
        $conversation->user_one = $request->input('user_one_fk');
        $conversation->user_two = $request->input('user_two_fk');
        $conversation->reply = $request->input("reply");
        $conversation->time = $request->input('time');
        $conversation->latitude = $request->input('latitude');
        $conversation->longitude = $request->input('longitude');
        $conversation->created_at = $request->input('created_at');
        $conversation->updated_at = $request->input('updated_at');
        $conversation->save();
        $response["conversations"] = $conversation;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function delete($id){
        $conversation  = DB::table('conversations')->where('id',$id)->get();
        $conversation->delete();
        return response()->json('Removed successfully.');
    }
    public function index(){
        $conversation  = Conversation::all();
        $response[0] = $conversation;
        $response["success"] = 1;

        echo $conversation;

        return response()->json($response);
    }
    public function listConversations($idUser){
        $conversation  = DB::table('conversations')->where('user_one_fk',$idUser)->get();
        $response["conversations"] = $conversation;
        $response["success"] = 1;
        return response()->json($response);
    }
    public function registerUser(Request $request){

        $response = \App\User::create([
            'user' => $request::input('username'),
            'email' => $request::input('email'),
            'password' => Hash::make($request::input('password'))
        ]);
        var_dump($response);
        return response()->json($response);
    }
    public function auth(Request $request){

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){

            $usr = User::where('email', $credentials['email'])->get();

            return response($usr);

        } else{
            return \response("Invalid credentials",420);
        }
    }
}
