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
        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => '',
            'uid' => $this->makeUid(),
            'friend_code' => $this->makeFriendCode(),
            'public_key' => $request->public_key
        ];
        return $data;
    }

    public function getUserByEmail($email){
        return $this->userRepository->getUserByEmail($email);
    }

    public function getUserByFriendCode($code){
        return $this->userRepository->checkFriendCode($code);
    }

    public function getUserById($id){
        return $this->userRepository->getUserById($id);
    }

    private function makeFriendCode(){
        return '#' . md5(rand(1, 10) . microtime());
    }

    private function makeUid(){
        return md5(rand(1, 10) . microtime());
    }
}
