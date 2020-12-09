<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function indexAll()
    {
        return Appointment::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $appointments = Appointment::where('user_id', '=', $user)->get();
        return $appointments;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $input=$request->all();
    
            $rules=[
                'status'=>'required',
                'diagnosis'=>'required',
                'price'=> 'required'
            ];
    
            $messages=[
                'title.required'=>'The title field is empty.',
                'description.required'=>'The description field is empty.',
                'price.required'=> 'The price field is empty'
            ];
    
            $validator = Validator::make($input,$rules,$messages);
    
            if ($validator->fails()) {
                return response()->json([$validator->errors()],400);
            }
    
            $user = Auth::user();
            $appointment = new Appointment($input);
            $appointment->user_id = $user->id;
            $appointment->save();
            return response()->json($appointment, 201);
            } catch (\Exception $e) {
                return response()->json($e, 400);
            }
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $deleted = Appointment::whereId($id)->delete();
            if ($deleted)
                return response()->json(['message' => 'Appointment deleted succesfully.'], 200);
            else
                return response()->json(['message' => 'Nothing to delete.'], 200);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }
}
