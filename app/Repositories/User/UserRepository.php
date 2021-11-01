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

    public function create($data)
    {
        $this->model::insert($data);
    }

    public function getUserByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    public function getUserCredentials($name, $passowrd)
    {
        return $this->model->where('name', $name)
            ->where('password', $passowrd)
            ->first();
    }

    public function checkUid($uid)
    {
        return $this->model->where('uid', $uid)->first();
    }

    public function checkFriendCode($friendCode)
    {
        return $this->model->where('friend_code', $friendCode)->first();
    }

    public function addFriend($id, $accepted)
    {
        getUser()->friends()->attach($id, [
            'accepted' => $accepted
        ]);
    }

    public function cancelFriendRequest($id)
    {
        getUser()->friendsRequest()->detach($id);
    }

    public function acceptFriendRequest($id)
    {
        return getUser()->friendsRequest()->updateExistingPivot($id, [
            'accepted' => true,
        ]);
    }

    public function getFriend($id)
    {
        return getUser()->friends()->wherePivot('friend_id', $id)->first();
    }

    public function updateImage($image)
    {
        $this->model->where('id', getUser()->id)->update([
            'image' => $image
        ]);
    }

    public function sendMessage($friendId, $message)
    {
        getUser()->messages()->attach($friendId, [
            'message' => $message
        ]);
    }

    public function markAsReadFriendMessages($friendId){
        getUser()->friendMessages()->updateExistingPivot($friendId, [
            'read' => true,
        ]);
    }
}
