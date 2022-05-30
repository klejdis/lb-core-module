<?php

namespace Modules\LBCore\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email'    => $request->input('email'),
            'password'    => $request->input('password'),
        ];

        try {
            if($user = Sentinel::authenticate($credentials)){
                return response()->json([
                    'data' => $user->createToken($user->email)->plainTextToken
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'errors' => true,
                'message' => $exception->getMessage(),

            ]);
        }

        return response()->json([
            'errors' => false,
            'message' => 'Login Error, Email or Password Incorrect',

        ]);
    }

    public function register(Request $request){

        $credentials = [
            'email'    => 'john.doe@example.com',
            'password' => 'password',
        ];

        $user = Sentinel::create($credentials);

        if ($user){
            $activation = Activation::create($user);
            Activation::complete($user,$activation->code);
        }


    }


}
