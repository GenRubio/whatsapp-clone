<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService extends Controller
{
    private $userRepository;
    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function validateUser($name, $password){
        $userExist = $this->userIsExist($name);
        if ($userExist && $this->makeAuthUser($userExist)){
            return true;
        }
        else{
            $user = $this->userRepository->firstOrCreate($this->prepareData($name, $password));
  
            if ($user && $this->makeAuthUser($user)){
                return true;
            }
            return false;
        }
    }

    private function prepareData($name, $password){
        $data = [
            'name' => $name,
            'password' => Hash::make($password),
            'email' => '',
            'uid' => $this->makeUid(),
            'friend_code' => $this->makeFriendCode()
        ];

        return $data;
    }

    private function makeFriendCode(){
        $code = uniqid('#');
        while ($this->userRepository->checkFriendCode($code)){
            $code = uniqid('#');
        }
        return $code;
    }

    private function makeUid(){
        $uid = uniqid();
        while ($this->userRepository->checkUid($uid)){
            $uid = uniqid();
        }
        return $uid;
    }

    private function makeAuthUser($user){
        Auth::login($user);
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    private function userIsExist($name){
        return $this->userRepository->getUser($name);
    }
}
