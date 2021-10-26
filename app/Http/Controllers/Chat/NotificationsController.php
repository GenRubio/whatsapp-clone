<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationsController extends Controller
{
    public function acceptFriendRequest(Request $request)
    {
        $friendUid = null;
        (new UserService())->acceptFriendRequest($request->code);
        $friend = (new UserService())->getFriendByCode($request->code);
        if ($friend){
            $friendUid = $friend->uid;
        }

        $pendingRequests = pendingFriendRequest();
        
        return response()->json([
            'content' => view('components.pending-friend-list', [
                'pendingFriendRequests' => $pendingRequests ,
            ])->render(),
            'bell' => view('components.bell-count-messages', [
                'pendingFriendRequests' => count($pendingRequests),
            ])->render(),
            'friendUid' => $friendUid
        ], Response::HTTP_CREATED);
    }

    public function removeFriendRequest(Request $request)
    {
        (new UserService())->cancelFriendRequest($request->code);
        $pendingRequests = pendingFriendRequest();
        
        return response()->json([
            'content' => view('components.pending-friend-list', [
                'pendingFriendRequests' => $pendingRequests ,
            ])->render(),
            'bell' => view('components.bell-count-messages', [
                'pendingFriendRequests' => count($pendingRequests ),
            ])->render()
        ], Response::HTTP_CREATED);
    }
}