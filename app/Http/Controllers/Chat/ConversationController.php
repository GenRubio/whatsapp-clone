<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
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

        $friend = (new UserService())->getFriendByCode($request->friendCode);
        if ($friend) {
            $success = true;
            $content = view('partials.chat-friend-messages', ['friend' => $friend])->render();
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
        ], Response::HTTP_CREATED);
    }

    public function sendMessage(Request $request)
    {
        $success = false;
        $content = null;
        $socketData = null;

        $friend = (new UserService())->getFriendByCode($request->friendCode);
        if ($friend && $request->message != "") {
            (new UserService())->sendMessage($friend->id, $request->message);

            $success = true;
            $content = view('components.messages.user-message', [
                'message' => $request->message,
                'hour' => Carbon::now('Europe/Madrid')->format('H:i')
            ])->render();
            $socketData = $this->getSocketData($friend, $request->message);
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
            'socketData' => $socketData
        ], Response::HTTP_CREATED);
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

    public function receiveMessage(Request $request)
    {
        return response()->json([
            'content' => view('components.messages.friend-message', [
                'message' => $request->message,
                'hour' => Carbon::now('Europe/Madrid')->format('H:i')
            ])->render()
        ], Response::HTTP_CREATED);
    }
}
