<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Group;
use Illuminate\Http\Request;

class GroupsController extends CrudController {

	public function __construct(Group $model) {
        $this->model = $model;
        $this->singular = 'group';
        $this->plural = 'groups';
        $this->humanName = 'Gruppe';
    }

}
