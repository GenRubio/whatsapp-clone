<?php

namespace App\Repositories\UserFriend;

use App\Models\UserFriend;
use App\Repositories\Repository;


/**
 * Class UserFriendRepository
 * @package App\Repositories\UserFriend
 */
class UserFriendRepository extends Repository implements UserFriendRepositoryInterface
{
    /**
     * @var userFriend
     */
    protected $model;

    /**
     * UserFriendRepository constructor.
     */
    public function __construct()
    {
        $this->model = new UserFriend();
        parent::__construct($this->model);
    }

    public function create($data)
    {
        $this->model->create($data);
    }

    public function getFriendRequest($requestFriendId)
    {
        return $this->model->where('friend_id', getUser()->id)
            ->where('user_id', $requestFriendId)
            ->first();
    }

    public function cancelFriendRequest($requestFriendId)
    {
        $this->model->where('friend_id', getUser()->id)
            ->where('user_id', $requestFriendId)
            ->delete();
    }

    public function checkIfExistRequest($friendId)
    {
        return $this->model->where('user_id', getUser()->id)
            ->where('friend_id', $friendId)
            ->first();
    }

    public function updateAccept($requestFriendId)
    {
        $this->model->where('friend_id', getUser()->id)
            ->where('user_id', $requestFriendId)
            ->update([
                'accepted' => true
            ]);
    }

    public function getFriendsByNameLike($name){
        $friends = collect();
        foreach(getUser()->friends as $friend){
            if (str_contains(strtolower($friend->user->name), strtolower($name))){
                $friends[] = $friend;
            }
        }
        return $friends;
    }
}
