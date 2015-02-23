<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Trigger;
use App\Models\TriggerSlot;
use Request;
use Session;

class TriggersController extends CrudController {

	public function __construct(Trigger $model) {
        $this->model = $model;
        $this->singular = 'trigger';
        $this->plural = 'triggers';
        $this->humanName = 'Auslöser';
    }


    public function store() {
        $data = Request::all();

        $obj = Trigger::create($data);

        $slot = new TriggerSlot();
        $slot->text = 'Alarmierungstext';
        $slot->weekday = 8;
        $slot->start = '0:00';
        $slot->end = '23:59';
        $slot->save();

        $obj->triggerslots()->save($slot);

        Session::flash('flash_message', 'Auslöser angelegt.');

        if(Request::has('submit_list')) {
            return redirect()->route($this->plural.'.index');
        }
        else if(Request::has('submit_new')) {
            return redirect()->action($this->plural.'.create');
        }
        else if(Request::has('submit_view')) {
            return redirect()->route($this->plural.'.edit', [$obj->id]);
        }
        else {
            abort(404);
            return;
        }
    }

    public function beforeDelete($trigger) {
        $trigger->triggerslots()->get()->each(function($slot) {
                $slot->delete();
            });
    }
}
