<?php

namespace App\Repositories\UserFriend;

/**
 * Interface UserFriendRepositoryInterface
 * @package App\Repositories\UserFriend
 */
interface UserFriendRepositoryInterface
{
    public function updateAccept($requestFriendId);
    public function cancelFriendRequest($requestFriendId);
    public function getFriendRequest($requestFriendId);
    public function checkIfExistRequest($friendId);
    public function create($data);
    public function getFriendsByNameLike($name);
}
