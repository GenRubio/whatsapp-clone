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
        return response()->json($this->getJson($socketData), Response::HTTP_CREATED);
    }

    private function getSocketData($friend)
    {
        return json_encode([
            'uid' => $friend->uid,
            'name' => getUser()->name,
            'channel' => 'friend-accept-request'
        ]);
    }

    public function removeFriendRequest(Request $request)
    {
        (new UserService())->cancelFriendRequest($request->code);
        return response()->json($this->getJson(), Response::HTTP_CREATED);
    }

    public function reloadContent()
    {
        return response()->json($this->getJson(), Response::HTTP_CREATED);
    }

    private function getJson($socketData = null)
    {
        $pendingRequests = pendingFriendRequest();

        return [
            'content' => view('components.pending-friend-list', [
                'pendingFriendRequests' => $pendingRequests,
            ])->render(),
            'bell' => view('components.bell-count-messages', [
                'pendingFriendRequests' => count($pendingRequests),
            ])->render(),
            'socketData' => $socketData
        ];
    }
}
