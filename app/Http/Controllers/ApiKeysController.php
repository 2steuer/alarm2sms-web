<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use Request;
use Session;

use App\Models\Person;
use DB;
use App\Models\Group;

class ApiKeysController extends CrudController {

    public function __construct(ApiKey $model) {
        $this->model = $model;
        $this->singular = 'apikey';
        $this->plural = 'apikeys';
        $this->humanName = 'API-Keys';

    }

    public function store()
    {
        $data = Request::all();
        $data['key'] = md5($data['name'].time().microtime());
        $obj = $this->model->create($data);

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

    /*
    public function update($id)
    {
        $data = Request::all();

        $obj = $this->model->findOrFail($id);

        $obj->update($data);

        Session::flash('flash_message', 'Änderungen gespeichert.');

        return redirect()->route($this->plural.'.index');
    }*/
}
