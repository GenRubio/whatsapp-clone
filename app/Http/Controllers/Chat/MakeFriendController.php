<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MakeFriendController extends Controller
{
    public function sendRequest(Request $request)
    {
        $success = false;
        $message = 'Ha ocurrido un error';

        $friend = (new UserService())->getUserByFriendCode($request->friendCode);
        
        if ($friend && !friendSearchStatus($friend->id)) {
            (new UserService())->addFriend($friend->id, false);

            $success = true;
            $message = "Solicitud enviada correctamente.";
        } else {
            $message = 'Este usuario no existe.';
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ], Response::HTTP_CREATED);
    }
}
