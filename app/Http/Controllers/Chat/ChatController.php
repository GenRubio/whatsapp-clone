<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use App\Services\UserFriendService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    public function updateChatListUserMessage(Request $request){
        $success = false;
        $content = null;
        $userService = new UserService();
        $userFriendService = new UserFriendService();

        $user = $userService->getUserByFriendCode($request->friendCode);
        if ($user){
            $friend = $userFriendService->getFriend($user->id);
            if ($friend){
                $lastMessage = getLastMessage($user->id);
                if ($lastMessage){
                    $success = true;
                    $container = $request->container == "true" ? true : false;
                    if ($container){
                        $content = $this->getChatItemContentView($friend);
                    }
                    else{
                        $content = $this->getChatItemView($friend);
                    }
                }
            }
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
        ], Response::HTTP_CREATED);
    }

    private function getChatItemView($friend){
        return view('components.conversation-item', [
            'friend' => $friend
        ])->render();
    }

    private function getChatItemContentView($friend){
        return view('components.conversation-item-content', [
            'friend' => $friend
        ])->render();
    }
}
