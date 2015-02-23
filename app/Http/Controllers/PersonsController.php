<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

use App\Models\Person;

class PersonsController extends Controller {

    public function index() {
        $persons = Person::orderBy('name', 'asc')->get();

        return view('persons.list', array('title' => 'Personen', 'persons' => $persons, 'show_subnav' => true));
    }


    //Create a new Person
    public function create() {
        return view('persons.new', array('title' => 'Person hinzufügen', 'show_subnav' => true));
    }

    public function store() {
        $data = Request::all();

        if(!Request::has('flash')) {
            $data['flash'] = '0';
        }

        Person::create($data);

        if(Request::has('submit_list')) {
            return redirect()->action('PersonsController@index');
        }
        else if(Request::has('submit_new')) {
            return redirect()->action('PersonsController@create');
        }
        else {
            abort(404);
            return;
        }
    }

    //Edit an existing person
    public function edit($id) {
        $person = Person::findOrFail($id);

        return view('persons.edit', ['title' => 'Person bearbeiten', 'show_subnav' => false, 'person' => $person]);
    }

    public function update($id) {
        $person = Person::findOrFail($id);

        $data = Request::all();

        if(!Request::has('flash'))
            $data['flash'] = '0';

        $person->update($data);

        return redirect()->route('persons.index');
    }

}
