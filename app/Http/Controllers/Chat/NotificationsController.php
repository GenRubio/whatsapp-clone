<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserFriendService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationsController extends Controller
{
    public function acceptFriendRequest(Request $request)
    {
        $userService = new UserService();
        $userFriendService = new UserFriendService();
        $socketData = null;

        $friendRequest = $userFriendService->getFriendRequest($request->code);
        if ($friendRequest) {
            $friend = $userService->getUserById($friendRequest->user_id);
            if ($friend) {
                $userFriendService->updateFriendRequest($friend->id);
                $socketData = $this->getSocketData($friend);
            }
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
        $userFriendService = new UserFriendService();

        if ($userFriendService->getFriendRequest($request->code)) {
            $userFriendService->cancelFriendRequest($request->code);
        }
        return response()->json($this->getJson(), Response::HTTP_CREATED);
    }

    public function reloadContent()
    {
        return response()->json($this->getJson(), Response::HTTP_CREATED);
    }

    private function getJson($socketData = null)
    {
        return [
            'content' => $this->pendingRequestsListView(),
            'friendList' => $this->friendsListView(),
            'bell' => $this->bellNotificationsView(),
            'socketData' => $socketData
        ];
    }

    private function pendingRequestsListView()
    {
        return view('components.pending-friend-list', [
            'pendingFriendRequests' => getUser()->pendingRequest,
        ])->render();
    }

    private function friendsListView()
    {
        return view('partials.friends-list', [
            'friends' => getUser()->friends,
        ])->render();
    }

    private function bellNotificationsView()
    {
        return view('components.bell-count-messages', [
            'pendingFriendRequests' => count(getUser()->pendingRequest),
        ])->render();
    }
}
