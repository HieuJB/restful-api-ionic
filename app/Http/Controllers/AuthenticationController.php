<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Authentication\RegistrationRequest;
use App\Http\Requests\Authentication\LoginRequest;

use App\Models\User;
class AuthenticationController extends Controller
{
    public function Registration(RegistrationRequest $request){
        $request = $request->validated();
        $request['password']=Hash::make($request['password']);
        $user = User::create($request);
        return response()->json(['user'=>$user],200);
    }
    public function Login(LoginRequest $request){
        if(auth()->attempt($request->validated())){
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json(['user'=>$user,'accessToken'=>$accessToken,'message'=>'Login success'],200);
        }else{
            return response()->json(['message'=>'Wrong account or password'],211);
        }
    }



}
