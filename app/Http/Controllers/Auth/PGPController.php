<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PGPController extends Controller
{
    public function getTestRegisterMessage(Request $request){
        $success = false;
        $message = "Error";
        $content = null;
        $errorsKeyDetected = false;

        $errorsKey = $this->validatePublicKey($request->publicKey); 
        foreach($errorsKey as $error){
            if ($error){
                $message = $error;
                $errorsKeyDetected = true;
                break;
            }
        }

        if (!$errorsKeyDetected){
            $content = getRegisterTestMessage($request->publicKey);
            if ($content){
                $success = true;
            }
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'content' => $content
        ], Response::HTTP_CREATED);
    }

    private function validatePublicKey($key){
        $errors = [];
        $errors[] = $this->validateKeyContains($key, "-----BEGIN PGP PUBLIC KEY BLOCK-----");
        $errors[] = $this->validateKeyContains($key, "-----END PGP PUBLIC KEY BLOCK-----");
        $errors[] = $this->validateKetNotContainsComment($key, "Comment:");
        return $errors;
    }

    private function validateKeyContains($key, $text){
        if (!str_contains($key, $text)){
            return "La clave es publica es incorrecta.";
        }
        return null;
    }

    private function validateKetNotContainsComment($key, $text){
        if (str_contains($key, $text)){
            return "La clave es publica es incorrecta. Remueva el Comment:";
        }
        return null;
    }
}
