<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PGPController extends Controller
{
    public function savePrivateKeys(Request $request){
        $success = false;
        $message = "Error";
        $errorsKeyDetected = false;

        
        $errorsKey = $this->valdatePrivateKeys($request->privateKey); 
        foreach($errorsKey as $error){
            if ($error){
                $message = $error;
                $errorsKeyDetected = true;
                break;
            }
        }

        if (!$errorsKeyDetected){
            session(['privateKey' => $request->privateKey]);
            session(['privateKeyPassword' => $request->privateKeyPassword]);
            $success = true;
            $message = "Las llaves se han guardado correctamente.";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ], Response::HTTP_CREATED);
    }

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

    private function valdatePrivateKeys($key){
        $errors = [];
        $errors[] = $this->validateKeyContains($key, "-----BEGIN PGP PRIVATE KEY BLOCK-----");
        $errors[] = $this->validateKeyContains($key, "-----END PGP PRIVATE KEY BLOCK-----");
        $errors[] = $this->validateKeyContains($key, "Version:");
        $errors[] = $this->validateKetNotContainsComment($key, "Comment:");
        return $errors;
    }

    private function validatePublicKey($key){
        $errors = [];
        $errors[] = $this->validateKeyContains($key, "-----BEGIN PGP PUBLIC KEY BLOCK-----");
        $errors[] = $this->validateKeyContains($key, "-----END PGP PUBLIC KEY BLOCK-----");
        $errors[] = $this->validateKeyContains($key, "Version:");
        $errors[] = $this->validateKetNotContainsComment($key, "Comment:");
        return $errors;
    }

    private function validateKeyContains($key, $text){
        if (!str_contains($key, $text)){
            return "La clave es incorrecta. </br>Falta: </br>" . $text . "</br> en la clave.";
        }
        return null;
    }

    private function validateKetNotContainsComment($key, $text){
        if (str_contains($key, $text)){
            return "La clave es incorrecta. </br>Remueva el Comment:";
        }
        return null;
    }
}
