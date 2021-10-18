<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email','password');

        if(!Auth::attempt($credentials)){
            return response([
                "message" => "usuario y/o contraseña es invalido"
            ],401);
        }

        $accessToken = Auth::user()->createToken('austsgisg')->accessToken;

        return response([
            "user" => Auth::user(),
            "access_token" => $accessToken
        ]);
    }
}
