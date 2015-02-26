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


    public function edit($id) {
        $trigger = Trigger::findOrFail($id);
        $defaultSlot = $trigger->triggerslots()->default()->get()->first();
        $specialSlots = $trigger->triggerslots()->specials()->orderBy('weekday', 'asc')->orderBy('start', 'asc')->get();

        $params = ['trigger' => $trigger, 'defaultSlot' => $defaultSlot, 'specialSlots' => $specialSlots];

        return view('triggers.edit', $params);
    }

    public function store() {
        $data = Request::all();

        $obj = Trigger::create($data);

        $slot = new TriggerSlot();
        $slot->text = 'Alarmierungstext';
        $slot->weekday = 8;
        $slot->start = '0:00';
        $slot->end = '23:59:59';
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

    public function createslot($tid) {
        return view('triggers.createslot', ['triggerId' => $tid]);
    }

    public function storeslot($tid) {
        $newslot = TriggerSlot::create(Request::all());

        $trigger = Trigger::findOrFail($tid);
        $trigger->triggerslots()->save($newslot);

        Session::flash('flash_message', 'Abweichende Alarmierung erstellt.');

        if(Request::has('submit_back')) {
            return redirect()->route('triggers.edit', [$tid]);
        }
        else if(Request::has('submit_edit')) {
            return redirect()->route('triggerslot.edit', [$tid, $newslot->id]);
        }
        else {
            abort(404);
            return;
        }
    }

    public function editslot($tid, $sid) {
        $slot = Trigger::findOrFail($tid)->triggerslots()->findOrFail($sid);
        return view('triggers.editslot', ['triggerId' => $tid, 'slot' => $slot]);
    }

    public function updateslot($tid, $sid) {
        $slot = Trigger::findOrFail($tid)->triggerslots()->findOrFail($sid);
        $slot->update(Request::all());

        Session::flash('flash_message', 'Änderung gespeicher.');

        return redirect()->route('triggers.edit', $tid);
    }

    public function deleteslot($tid, $sid) {
        $slot = Trigger::findOrFail($tid)->triggerslots()->findOrFail($sid);

        return view('triggers.deleteslot', ['triggerId' => $tid, 'slot' => $slot]);
    }

    public function destroyslot($tid, $sid) {
        $slot = Trigger::findOrFail($tid)->triggerslots()->findOrFail($sid);
        $slot->delete();

        Session::flash('flash_message', 'Abweichende Alarmierung gelöscht.');

        return redirect()->route('triggers.edit', $tid);
    }
}
