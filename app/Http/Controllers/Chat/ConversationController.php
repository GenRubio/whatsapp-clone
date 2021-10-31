<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConversationController extends Controller
{
    public function openConversation(Request $request){
        $success = false;
        $content = null;

        $friend = (new UserService())->getFriendByCode($request->friendCode);
        if ($friend){
            $success = true;
            $content = view('partials.chat-friend-messages', ['friend' => $friend])->render();
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
        ], Response::HTTP_CREATED);
    }

    public function sendMessage(Request $request){
        $success = false;
        $content = null;

        $friend = (new UserService())->getFriendByCode($request->friendCode);
        if ($friend && $request->message != ""){
            (new UserService())->sendMessage($friend->id, $request->message);

            $success = true;
            $content = view('components.messages.user-message', [
                'message' => $request->message,
                'hour' => Carbon::now('Europe/Madrid')->format('H:i')
            ])->render();
        }

        return response()->json([
            'success' => $success,
            'content' => $content,
        ], Response::HTTP_CREATED);
    }
}
