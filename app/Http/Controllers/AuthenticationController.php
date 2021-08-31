<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
class AuthenticationController extends Controller
{
    public function Registration(RegistrationRequest $request){
        $user = User::create($request->validated());
        return response()->json(['user'=>$user],200);
    }

}
