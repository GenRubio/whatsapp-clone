<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConversationController extends Controller
{
    public function openConversation(Request $request)
    {
        $success = false;
        $content = null;
        $userService = new UserService();
        $messageService = new MessageService();

        $friend = $userService->getUserByFriendCode($request->friendCode);
        if ($friend) {
            $success = true;
            $content = $this->messagesListView($friend);
            $messageService->updateNotReadMessages($friend->id);
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
        ], Response::HTTP_CREATED);
    }

    private function messagesListView($friend)
    {
        return view('partials.chat-friend-messages', ['friend' => $friend])->render();
    }

    public function sendMessage(Request $request)
    {
        $success = false;
        $content = null;
        $socketData = null;
        $userService = new UserService();
        $messageService = new MessageService();

        $friend = $userService->getUserByFriendCode($request->friendCode);
        if ($friend && $request->message != "") {
            $messageService->createMessage($friend->id, $request->message);

            $success = true;
            $content = $this->messageView($request->message, false);
            $socketData = $this->getSocketData($friend, $request->message);
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
            'socketData' => $socketData
        ], Response::HTTP_CREATED);
    }

    public function receiveMessage(Request $request)
    {
        $userService = new UserService();
        $messageService = new MessageService();
        $friend = $userService->getUserByFriendCode($request->friendCode);
        if ($friend){
            $messageService->updateNotReadMessages($friend->id);
        }
        return response()->json([
            'content' => $this->messageView($request->message, true)
        ], Response::HTTP_CREATED);
    }

    private function messageView($message, $toFriend)
    {
        return view($toFriend ? 'components.messages.friend-message' : 'components.messages.user-message', [
            'message' => $message,
            'hour' => Carbon::now('Europe/Madrid')->format('H:i')
        ])->render();
    }

    private function getSocketData($friend, $message)
    {
        return json_encode([
            'uid' => $friend->uid,
            'userCode' => getUser()->friend_code,
            'message' => $message,
            'channel' => 'send-message-to-friend'
        ]);
    }
}
