<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserFriendService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MakeFriendController extends Controller
{
    public function sendRequest(Request $request)
    {
        $success = false;
        $message = 'Ha ocurrido un error';
        $socketData = null;
        $userService = new UserService();
        $userFriendService = new UserFriendService();

        $friend = $userService->getUserByFriendCode($request->friendCode);
        
        if ($friend) {
            if (!$userFriendService->checkIfExistFriendRequest($friend->id)){
                $userFriendService->makeFriendRequest($friend->id);
                $socketData = $this->getSocketData($friend);
    
                $success = true;
                $message = "Solicitud enviada correctamente.";
            }
        } else {
            $message = 'Este usuario no existe.';
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'socketData' => $socketData
        ], Response::HTTP_CREATED);
    }

    private function getSocketData($friend)
    {
        return json_encode([
            'uid' => $friend->uid,
            'name' => getUser()->name,
            'channel' => 'friend-send-request'
        ]);
    }
}
