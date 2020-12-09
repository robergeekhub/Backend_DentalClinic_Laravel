<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $input=$request->all();
        $input['password']=bcrypt($input['password']);

        $rules=[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ];

        $messages=[
            'name.required'=>'The name field is empty.',
            'email.required'=>'The email field is empty.',
            'password.required'=>'The password field is empty.'
        ];

        $validator = Validator::make($input,$rules,$messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }else{
            $user=User::create($input);
            return $user;
        } 
    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $token = $user->createToken('TokenUser')->accessToken;

            $respuesta=[];
            $respuesta['name']=$user->name;
            $respuesta['token']= 'Bearer '.$token;
            return response()->json($respuesta,200);
        }else{
            return response()->json(['error'=>'Not authenticated.'],401);
        }
    }
    public function logout(Request $request){
        $token = $request->user()->token();
        $token ->revoke();

        return response()->json('Logout done successfully.',200);

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        $user = User::find($user->id);

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}