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
    private $errors = [];
    private $userRepository;
    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function updateUserImage($imageUrl){
        $this->userRepository->updateImage($imageUrl);
    }

    public function cancelFriendRequest($code){
        $friendRequest = $this->getUserByFriendCode($code);
        if ($friendRequest){
            $this->userRepository->cancelFriendRequest($friendRequest->id);
        }
    }

    public function acceptFriendRequest($code){
        $friendRequest = $this->getUserByFriendCode($code);
        if ($friendRequest){
            $response = $this->userRepository->acceptFriendRequest($friendRequest->id);
            if ($response){
                $this->addFriend($friendRequest->id, true);
            }
        }
    }

    public function getFriendByCode($code){
        $friend = $this->getUserByFriendCode($code);
        return $this->userRepository->getFriend($friend->id);
    }

    public function addFriend($id, $accepted){
        $this->userRepository->addFriend($id, $accepted);
    }

    public function validateUser($name, $password){
        if ($this->authUser($name, $password)){
            return true;
        }
        else{
            return false;
        }
    }

    private function authUser($name, $password){
        if (Auth::attempt(['name' => $name, 'password' => $password]))
        {
            return true;
        }
        return false;
    }

    public function checkIfExistUser($name){
        return $this->userRepository->getUserByName($name) ? true : false;
    }

    public function createUser($request){
        $userData = $this->prepareData($request);
        if (!$this->errors){
            $this->userRepository->create($userData);
        }
        return $this->errors;
    }

    private function prepareData($request){
        $data = [];
        $response = validateEmail($request->email);
        if ($response['success']){
            $data = [
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'uid' => $this->makeUid(),
                'friend_code' => $this->makeFriendCode()
            ];
        }
        else{
            array_push($this->errors, $response['message']);
        }
        return $data;
    }

    public function getUserByFriendCode($code){
        return $this->userRepository->checkFriendCode($code);
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
}
