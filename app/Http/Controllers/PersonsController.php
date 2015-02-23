<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;

use App\Models\Person;

class PersonsController extends CrudController {

    public function __construct(Person $model) {
        $this->model = $model;
        $this->singular = 'person';
        $this->plural = 'persons';
        $this->humanName = 'Person';
        
    }


    /*public function index() {
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

        Session::flash('flash_message', 'Person angelegt.');

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

        Session::flash('flash_message', 'Änderungen gespeichert.');

        return redirect()->route('persons.index');
    }

    //Delete an existing person
    public function delete($id) {
        $person = Person::findOrFail($id);

        return view('persons.delete', ['title' => 'Person löschen', 'show_subnav' => false, 'person'=>$person]);
    }

    public function destroy($id) {
        $person = Person::findOrFail($id);
        $name = $person->name;

        $person->delete();

        Session::flash('flash_message', 'Die Person '. $name . ' wurde aus dem System gelöscht.');

        return redirect()->route('persons.index');
    }*/
}
