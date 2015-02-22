<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

use App\Models\Person;

class PersonsController extends Controller {

    public function index() {
        $persons = Person::all();

        return view('persons.list', array('title' => 'Personen', 'persons' => $persons, 'show_subnav' => true));
    }

    public function newform() {
        return view('persons.new', array('title' => 'Person hinzufügen', 'show_subnav' => true));
    }

    public function storenew() {
        $data = Request::all();

        if(!Request::has('flash')) {
            $data['flash'] = '0';
        }

        Person::create($data);

        if(Request::has('submit_list')) {
            return redirect('persons/list');
        }
        else if(Request::has('submit_new')) {
            return redirect('persons/new');
        }
        else {
            abort(404);
            return;
        }
    }

}
