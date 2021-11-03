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

    public function create($data){
        $this->model->create($data);
    }
}
