<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //
    function login(Request $request){
        // $input = $request->all();
        // return $input;
        $user = User::where('email', $request->email)->first();
        if(!$user || ! Hash::check($request->password , $user->password)){
            return ['result'=>"User not found", 'success'=>false];
        }
        $success['token']=$user->createToken('MyApp')->plainTextToken;
        $success['name']=$user->name;

        return ['result'=>$success];
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
