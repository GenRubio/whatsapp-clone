<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserFriendService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchFriendController extends Controller
{
    public function search(Request $request)
    {
        $userService = new UserService();
        $userFriendService = new UserFriendService();
        $status = null;

        $user = $userService->getUserByFriendCode($request->value);
        if ($user) {
            $friendUser = $userFriendService->getFriend($user->id);
            if ($friendUser) {
                if ($friendUser->accepted) {
                    $status = 'Accepted';
                } else {
                    $status = 'Pending';
                }
            }
        }

        return response()->json([
            'content' => $this->getSearchUserItem($user, $status)
        ], Response::HTTP_CREATED);
    }

    private function getSearchUserItem($user, $status)
    {
        return view('components.search-friend-item', [
            'user' => $user,
            'status' => $status
        ])->render();
    }
}
