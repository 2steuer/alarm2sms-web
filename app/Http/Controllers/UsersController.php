<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\User;
use Hash;
use Request;
use Session;

class UsersController extends CrudController {

	public function __construct(User $model) {
        $this->model = $model;
        $this->singular = 'user';
        $this->plural = 'users';
        $this->humanName = 'Benutzer';
    }

    public function store() {
        $pwd = Hash::make(Request::input('password_u'));

        $data = Request::only(['name', 'email', 'admin']);
        $data['password'] = $pwd;

        if(!Request::has('admin'))
            $data['admin'] = false;

        $obj = User::create($data);

        Session::flash('flash_message', $this->humanName . ' angelegt.');

        if(Request::has('submit_list')) {
            return redirect()->route($this->plural.'.index');
        }
        else if(Request::has('submit_new')) {
            return redirect()->route($this->plural.'.create');
        }
        else if(Request::has('submit_view')) {
            return redirect()->route($this->plural.'.edit', [$obj->id]);
        }
        else {
            abort(404);
            return;
        }
    }

    public function update($id) {
        $pwd = Hash::make(Request::input('password_u'));

        $data = Request::only(['name', 'email', 'admin']);
        $data['password'] = $pwd;

        if(!Request::has('admin'))
            $data['admin'] = false;

        $obj = User::findOrFail($id);

        Session::flash('flash_message', 'Änderungen gespeichert.');

        return redirect()->route($this->plural.'.index');
    }
}
