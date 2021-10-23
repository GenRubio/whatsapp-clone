<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @var user
     */
    protected $model;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new User();
        parent::__construct($this->model);
    }

    public function firstOrCreate($data){
        return $this->model::firstOrCreate([
            'name' => $data['name'],
            'password' => $data['password']
        ], [
            'email' => $data['email'],
            'uid' => $data['uid'],
            'friend_code' => $data['friend_code']
        ]);
    }

    public function getUser($name){
        return $this->model->where('name', $name)->first();
    }

    public function checkUid($uid){
        return $this->model->where('uid', $uid)->first();
    }

    public function checkFriendCode($friendCode){
        return $this->model->where('friend_code', $friendCode)->first();
    }
}
