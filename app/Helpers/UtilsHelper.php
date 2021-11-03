<?php

namespace App\Helpers;

use App\Models\Message;
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

    public static function getConversation($friendId, $order)
    {
        return messageQuery($friendId)->orderBy('date', $order)->get();
    }

    public static function getChatsStarted()
    {
        $chats = collect();
        foreach (getUser()->friends as $friend) {
            if (count(getConversation($friend->user->id, 'asc')) > 0) {
                $chats->push($friend);
            }
        }
        return $chats;
    }

    public static function getLastMessage($friendId)
    {
        return messageQuery($friendId)->orderBy('date', 'desc')->first();
    }

    public static function getNotReadMessages($friendId)
    {
        return messageQuery($friendId)->where('read', false)->count();
    }

    public static function getHourMessage($date)
    {
        return Carbon::parse($date)->format('H:i');
    }

    public static function messageQuery($friendId)
    {
        return Message::where(function ($query) use ($friendId) {
            $query->where('from_user', getUser()->id)
                ->where('to_user', $friendId);
        })
            ->orWhere(function ($query) use ($friendId) {
                $query->where('from_user', $friendId)
                    ->where('to_user', getUser()->id);
            });
    }
}
