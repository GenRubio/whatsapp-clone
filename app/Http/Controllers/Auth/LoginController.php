<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function userValidation(Request $request){
        if ((new UserService)->validateUser($request->name, $request->password)){
            $success = true;
        }
        else{
            $success = false;
        }
        return response()->json([
            'success' => $success,
        ], Response::HTTP_CREATED);
    }

    public function logOut(){
        Auth::logout();

        return response()->json([
        ], Response::HTTP_CREATED);
    }
}
