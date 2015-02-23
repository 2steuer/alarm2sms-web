<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Trigger;
use Illuminate\Http\Request;

class TriggersController extends CrudController {

	public function __construct(Trigger $model) {
        $this->model = $model;
        $this->singular = 'trigger';
        $this->plural = 'triggers';
        $this->humanName = 'Auslöser';
    }

}
