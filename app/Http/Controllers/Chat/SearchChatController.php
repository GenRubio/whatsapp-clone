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
        $conteiner = $request->type;
        $content = null;

        if ($conteiner == "newChat"){
            $content = $this->getFriendListView($friends);
        }
        elseif($conteiner == "Chat"){
            $content = $this->getChatsListView($friends);
        }

        return response()->json([
            'content' => $content,
            'container' => $conteiner
        ], Response::HTTP_CREATED);
    }

    private function getFriendByName($name){
        return (new UserFriendService())->getFriendsByNameLike($name);
    }

    private function getChatsListView($friends){
        return view('partials.conversations-list', [
            'friends' => $friends
        ])->render();
    }

    private function getFriendListView($friends)
    {
        return view('partials.friends-list', [
            'friends' => $friends
        ])->render();
    }
}
