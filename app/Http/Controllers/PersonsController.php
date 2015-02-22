<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller {

    public function index() {
        $persons = Person::all();

        return view('persons.list', array('title' => 'Personen', 'persons' => $persons, 'show_subnav' => true));
    }

    public function newform() {
        return view('persons.new', array('title' => 'Person hinzufügen', 'show_subnav' => true));
    }

}
