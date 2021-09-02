<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;


class RegController extends Controller
{


    public function register(Request $request) 
    { 

        $validator = Validator::make($request->all(), [ 
             'name'              =>      'required|string|max:20',
             'email'             =>      'required|email|unique:users,email',
             'phone'             =>      'required|numeric|min:10',
             'password'          =>      'required|alpha_num|min:6',
        ]);
       
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')->accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success]); 
    }

  
}