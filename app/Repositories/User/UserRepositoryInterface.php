<?php

namespace App\Repositories\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\User
 */
interface UserRepositoryInterface
{
    public function create($data);
    public function getUserByName($name);
    public function getUserCredentials($name, $password);
    public function checkUid($uid);
    public function checkFriendCode($friendCode);
    public function updateImage($image);
    public function getUserById($id);
}
