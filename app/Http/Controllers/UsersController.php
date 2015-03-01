<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\User;

class UsersController extends CrudController {

	public function __construct(User $model) {
        $this->model = $model;
        $this->singular = 'user';
        $this->plural = 'users';
        $this->humanName = 'Benutzer';
    }

    public function store() {
        
    }
}
