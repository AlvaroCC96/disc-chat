<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /** Function for register a new user.
     * @param Request $request
     * @return JsonResponse
     */
    public function registerUser(Request $request){

        $usr = $request::input('username');
        $email = $request::input('email');
        $pw = $request::input('password');
        $usrSameEmail=User::where('email',$email)->get('id');
        $usrSameUser =User::where('user',$usr)->get('id');

        //same email
        if (sizeof($usrSameEmail) != 0 ) {
            $response['code'] = 1;
            return response()->json($response);

        } elseif ( sizeof($usrSameUser) != 0 ){
            $response['code'] = 2;
            //same user
            return response()->json($response);
        } else {
            //register perfect
            User::create([
                'user' => $request::input('username'),
                'email' => $request::input('email'),
                'password' => Hash::make($request::input('password'))
            ])->save();
            $response['code'] = 0;
            return response()->json($response);
        }
    }

    /**
     * Funtion for validate login for user
     */
    public function auth(Request $request){

        $mail = $request::input('email');
        $pw = $request::input('password');

        $array = [
            'email' => $mail,
            'password' => $pw,
        ];

        if(Auth::attempt($array)){

            $usr = User::where('email', $array['email'])->get();
            $response['code'] = 0;
            $response['userId'] = $usr[0]->id;
            $response['username'] = $usr[0]->user;

            return response()->json($response);

        } else{
            $response['code'] = 1;
            $response['userId'] = -1;
            $response['username'] = '';

            return response()->json($response);
        }
    }

}
