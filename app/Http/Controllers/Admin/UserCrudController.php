<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    private function removeButtons(){
        $this->crud->removeButton('create');
    }

    protected function setupListOperation()
    {
        $this->removeButtons();

        $this->crud->addColumns([
            [
                'name' => 'id',
                'type' => 'text',
                'label' => 'ID',
            ],
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre',
            ],
            [
                'name' => 'uid',
                'type' => 'text',
                'label' => 'UID Channel',
            ],
            [
                'name' => 'friend_code',
                'type' => 'text',
                'label' => 'Token',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('password');
        CRUD::field('uid');
        CRUD::field('friend_code');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
