<?php

namespace App\Repositories\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\User
 */
interface UserRepositoryInterface
{
    public function firstOrCreate($data);
    public function getUser($name);
    public function checkUid($uid);
    public function checkFriendCode($friendCode);
}
