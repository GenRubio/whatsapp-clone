<?php

namespace App\Helpers;

use App\Models\Page;
use App\Models\PresetEmail;
use App\Models\Rgpd;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Exception;

class UtilsHelper
{
    public static function validateEmail($email)
    {
        $response = [
            'success' => true,
            'message' => ''
        ];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = [
                'success' => false,
                'message' => 'Invalid email format'
            ];
        } else {
            $user = User::where('email', $email)->first();
            if ($user) {
                $response = [
                    'success' => false,
                    'message' => 'Este email ya esta en uso.'
                ];
            }
        }
        return $response;
    }

    public static function friendSearchStatus($friendId)
    {
        $friend = getUser()->friends()->firstWhere('friend_id', $friendId);
        if ($friend) {
            if ($friend->pivot->accepted) {
                return "Accepted";
            } else {
                return "Pending";
            }
        }
        return null;
    }

    public static function pendingFriendRequest()
    {
        return getUser()->friendsRequest()->where('accepted', 0)->get();
    }

    public static function getConversation($friendId)
    {
        $messages = User::where('id', getUser()->id)->join('friend_user_message', function ($join) use ($friendId) {
            $join->on('friend_user_message.from_user', '=', 'users.id')
                ->where('friend_user_message.to_user', '=', $friendId);
            $join->orOn('friend_user_message.to_user', '=', 'users.id')
                ->where('friend_user_message.from_user', '=', $friendId);
            $join->orderBy('date', 'asc');
        })->get();

        return $messages;
    }

    public static function getChatsList()
    {
        $chats = collect();

        foreach (getUser()->friends as $friend) {
            if (count(getConversation($friend->id)) > 0) {
                $chats->push($friend);
            }
        }
        return $chats;
    }

    public static function getLastMessage($friendId)
    {
        $message = User::where('id', getUser()->id)->join('friend_user_message', function ($join) use ($friendId) {
            $join->on('friend_user_message.from_user', '=', 'users.id')
                ->where('friend_user_message.to_user', '=', $friendId);
            $join->orOn('friend_user_message.to_user', '=', 'users.id')
                ->where('friend_user_message.from_user', '=', $friendId);
            $join->orderBy('date', 'desc');
        })->first();

        return $message;
    }

    public static function getNotReadMessages($friendId)
    {
        return getUser()->friendMessages()->where('from_user', $friendId)
            ->wherePivot('read', false)->count();
    }

    public static function getHourMessage($date)
    {
        return Carbon::parse($date)->format('H:i');
    }
}
