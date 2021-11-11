<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MessageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MessageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Message::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/message');
        CRUD::setEntityNameStrings('message', 'messages');
    }

    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('from_user');
        CRUD::column('to_user');
        CRUD::column('message');
        CRUD::column('read');
        CRUD::column('date');
        CRUD::column('created_at');
        CRUD::column('updated_at');

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(MessageRequest::class);

        CRUD::field('id');
        CRUD::field('from_user');
        CRUD::field('to_user');
        CRUD::field('message');
        CRUD::field('read');
        CRUD::field('date');
        CRUD::field('created_at');
        CRUD::field('updated_at');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
