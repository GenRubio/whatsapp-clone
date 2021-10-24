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
        }
        else{
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

    public static function friendSearchStatus($friendId){
        $friend = getUser()->friends()->firstWhere('friend_id', $friendId);
        if ($friend){
            if ($friend->pivot->accepted){
               return "Accepted";
            }
            else{
               return "Pending";
            }
        }
        return null;
    }

    public static function pendingFriendRequest(){
        return getUser()->friendsRequest()->where('accepted', 0)->get();
    }
}
