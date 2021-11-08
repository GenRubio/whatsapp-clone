<?php

use App\Helpers\AuthHelper;
use App\Helpers\PHPHelper;
use App\Helpers\UtilsHelper;

/**
 * AuthHelper
 */

if (!function_exists('isAdmin')) {
    function isAdmin($user = null)
    {
        return AuthHelper::isAdmin($user);
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin($user = null)
    {
        return AuthHelper::isSuperAdmin($user);
    }
}

if (!function_exists('isAdminOrSuperadmin')) {
    function isAdminOrSuperadmin($user = null)
    {
        return AuthHelper::isAdminOrSuperadmin($user);
    }
}

if (!function_exists('userIsActive')) {
    function userIsActive($user)
    {
        return AuthHelper::userIsActive($user);
    }
}

if (!function_exists('getUser')) {
    function getUser()
    {
        return AuthHelper::getUser();
    }
}


/**
 * UtilsHelper
 */

if (!function_exists('validateEmail')) {
    function validateEmail($email)
    {
        return UtilsHelper::validateEmail($email);
    }
}


if (!function_exists('getHourMessage')) {
    function getHourMessage($date)
    {
        return UtilsHelper::getHourMessage($date);
    }
}

if (!function_exists('getConversation')) {
    function getConversation($friendId, $order)
    {
        return UtilsHelper::getConversation($friendId, $order);
    }
}

if (!function_exists('getChatsStarted')) {
    function getChatsStarted()
    {
        return UtilsHelper::getChatsStarted();
    }
}

if (!function_exists('getLastMessage')) {
    function getLastMessage($friendId)
    {
        return UtilsHelper::getLastMessage($friendId);
    }
}

if (!function_exists('getNotReadMessages')) {
    function getNotReadMessages($friendId)
    {
        return UtilsHelper::getNotReadMessages($friendId);
    }
}

if (!function_exists('getRegisterTestMessage')) {
    function getRegisterTestMessage($publicKey)
    {
        return PHPHelper::getRegisterTestMessage($publicKey);
    }
}