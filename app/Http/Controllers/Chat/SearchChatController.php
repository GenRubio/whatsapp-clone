<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserFriendService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchChatController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->value;
        $friends = $this->getFriendByName($search);

        return response()->json([
            'content' => $this->getFriendListView($friends)
        ], Response::HTTP_CREATED);
    }

    private function getFriendByName($name){
        return (new UserFriendService())->getFriendsByNameLike($name);
    }

    private function getFriendListView($friends)
    {
        return view('partials.friends-list', [
            'friends' => $friends
        ])->render();
    }
}
