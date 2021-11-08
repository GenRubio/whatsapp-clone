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

        dd($request->publicKey);

        return response()->json([
            'success' => $success,
            'message' => $message,
            'content' => $content
        ], Response::HTTP_CREATED);
    }
}
