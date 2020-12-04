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
            $user = Auth::user();
            $token = $user->createToken('DentalClinic')->accessToken;

            $respuesta=[];
            $respuesta['name']=$user->name;
            $respuesta['token']= 'Bearer '.$token;
            return response()->json($respuesta,200);
        }else{
            return response()->json(['error'=>'Not authenticated'],401);
        }
    }
    public function logout(Request $request){
        $token = $request->user()->token();
        $token ->revoke();

        return response()->json('User perfect log out',200);

}
}