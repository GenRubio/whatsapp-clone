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
        (new UserService())->acceptFriendRequest($request->code);

        $socketData = null;
        $friend = (new UserService())->getFriendByCode($request->code);
        if ($friend) {
            $socketData = $this->getSocketData($friend);
        }

        $pendingRequests = pendingFriendRequest();

        return response()->json([
            'content' => view('components.pending-friend-list', [
                'pendingFriendRequests' => $pendingRequests,
            ])->render(),
            'bell' => view('components.bell-count-messages', [
                'pendingFriendRequests' => count($pendingRequests),
            ])->render(),
            'socketData' => $socketData
        ], Response::HTTP_CREATED);
    }

    private function getSocketData($friend)
    {
        return json_encode([
            'uid' => $friend->uid,
            'name' => getUser()->name
        ]);
    }

    public function removeFriendRequest(Request $request)
    {
        (new UserService())->cancelFriendRequest($request->code);
        $pendingRequests = pendingFriendRequest();

        return response()->json([
            'content' => view('components.pending-friend-list', [
                'pendingFriendRequests' => $pendingRequests,
            ])->render(),
            'bell' => view('components.bell-count-messages', [
                'pendingFriendRequests' => count($pendingRequests),
            ])->render()
        ], Response::HTTP_CREATED);
    }
}
