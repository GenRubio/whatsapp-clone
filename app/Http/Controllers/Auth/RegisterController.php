<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function register(Request $request){
        $success = false;
        $message = "Ha ocurrido un error";

        if (!(new UserService)->checkIfExistUser($request->name)){

            $errors = (new UserService)->createUser($request);
            if ($errors){
                $success = false;
                $message = $errors[0];
            }
            else{
                $success = true;
                $message = "Usuario creado correctamente";
            }
        }
        else{
            $message = "Este nombre de usuario ya esta en uso.";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ], Response::HTTP_CREATED);
    }
}
