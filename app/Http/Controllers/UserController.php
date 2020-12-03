<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $input=$request->all();
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);

        return $user;
    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return response()->json('Correct',400);
        }else{
            return response()->json(['error'=>'Not authenticated'],203);
        }
    }
}
