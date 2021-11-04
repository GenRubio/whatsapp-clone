<?php

namespace App\Repositories\Message;

use App\Models\Message;
use App\Repositories\Repository;


/**
 * Class MessageRepository
 * @package App\Repositories\Message
 */
class MessageRepository extends Repository implements MessageRepositoryInterface
{
    /**
     * @var message
     */
    protected $model;

    /**
     * MessageRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Message();
        parent::__construct($this->model);
    }

    public function create($data)
    {
        $this->model->create($data);
    }

    public function updateNotReadMessages($friendId)
    {
        $this->model->where('to_user', getUser()->id)
            ->where('from_user', $friendId)
            ->update([
                'read' => true
            ]);
    }

    public function getConversation($friendId)
    {
        return $this->model->where(function ($query) use ($friendId) {
            $query->where('from_user', getUser()->id)
                ->where('to_user', $friendId);
        })
            ->orWhere(function ($query) use ($friendId) {
                $query->where('from_user', $friendId)
                    ->where('to_user', getUser()->id);
            });
    }

    public function getConversationUserNotReadMessages($friendId)
    {
        return $this->model->where('from_user', $friendId)
            ->where('to_user', getUser()->id)
            ->where('read', false)
            ->count();
    }
}
