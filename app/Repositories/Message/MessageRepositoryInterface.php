<?php

namespace App\Repositories\Message;

/**
 * Interface MessageRepositoryInterface
 * @package App\Repositories\Message
 */
interface MessageRepositoryInterface
{
    public function create($data);
    public function updateNotReadMessages($friendId);
    public function getConversation($friendId);
    public function getConversationUserNotReadMessages($friendId);
}
