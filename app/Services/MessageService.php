<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Repositories\Message\MessageRepository;
use Carbon\Carbon;

class MessageService extends Controller
{
    private $messageRepository;
    public function __construct()
    {
        $this->messageRepository = new MessageRepository();
    }

    public function createMessage($friendId, $message){
        $this->messageRepository->create($this->prepareData($friendId, $message));
    }

    private function prepareData($friendId, $message){
        $data = [
            'from_user' => getUser()->id,
            'to_user' => $friendId,
            'message' => $message,
            'read' => false,
            'date' => Carbon::now('Europe/Madrid')
        ];

        return $data;
    }
}
