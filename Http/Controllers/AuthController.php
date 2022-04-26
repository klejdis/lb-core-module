<?php

namespace Modules\LBCore\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = [
            'email'    => $request->input('email'),
            'password'    => $request->input('password'),
        ];

        if(Sentinel::authenticate($credentials)){

            return 1;
        }


    }


}
