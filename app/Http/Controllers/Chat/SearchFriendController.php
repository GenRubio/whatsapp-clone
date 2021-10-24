<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchFriendController extends Controller
{
    public function search(Request $request){
        $user = (new UserService)->getUserByFriendCode($request->value);

        return response()->json([
            'content' => view('components.search-friend-item', ['user' => $user])->render()
        ], Response::HTTP_CREATED);
    }
}
