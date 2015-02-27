<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;

use App\Models\Person;
use DB;

class PersonsController extends CrudController {

    public function __construct(Person $model) {
        $this->model = $model;
        $this->singular = 'person';
        $this->plural = 'persons';
        $this->humanName = 'Person';

    }


    public function beforeDelete($obj) {
        DB::table('group_person')
            ->where('person_id', $obj->id)->delete();
    }
}
