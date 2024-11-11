<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //
    function login(Request $request){
        return "Login function";
    }

    function signUp(Request $request){
        $input = $request->all();
        $input["password"]=bcrypt($input["password"]);
        $user = User::create($input);
        $success['token']=$user->createToken('MyApp')->plainTextToken;
        $user['name']=$user->name;

        return ['success'=>true, 'result'=>$success];
    }
}
