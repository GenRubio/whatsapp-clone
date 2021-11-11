<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserFriendRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class UserFriendCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\UserFriend::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-friend');
        CRUD::setEntityNameStrings('user friend', 'user friends');
    }


    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('friend_id');
        CRUD::column('user_id');
        CRUD::column('accepted');
        CRUD::column('created_at');
        CRUD::column('updated_at');

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserFriendRequest::class);

        CRUD::field('id');
        CRUD::field('friend_id');
        CRUD::field('user_id');
        CRUD::field('accepted');
        CRUD::field('created_at');
        CRUD::field('updated_at');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
