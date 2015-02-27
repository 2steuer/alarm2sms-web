<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Trigger;
use App\Models\TriggerSlot;
use Request;
use Session;
use App\Models\Group;
use DB;

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
        return view('triggers.editslot', ['triggerId' => $tid, 'slot' => $slot, 'groups' => $slot->groups()->orderBy('pivot_order', 'asc')->get()]);
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

    // CRUD over... now Group-Management on TriggerSlots...

    public function slotaddgroup($tid, $sid) {
        $group = Group::findOrFail(Request::input('group_id'));
        $slot = Trigger::findOrFail($tid)->triggerslots()->findOrFail($sid);

        $num = Request::input('order');
        $currentCount = $slot->groups()->count();

        if($slot->groups->contains($group->id)) {
            Session::flash('flash_message', 'Gruppe ist der Alarmierung bereits zugeordnet.');
            Session::flash('flash_message_class', 'alert-danger');
        }
        else {
            if($num <= $currentCount) {
                DB::table('group_triggerslot')
                    ->where('triggerslot_id', $sid)
                    ->where('order', '>=', $num)
                    ->increment('order');
            }

            $slot->groups()->attach($group, ['order' => $num]);

            Session::flash('flash_message', 'Gruppe zugeordnet.');
        }

        if(Request::has('submit_slotedit')) {
            return redirect()->route('triggerslot.edit', [$tid, $sid]);
        }
        else if(Request::has('submit_triggeredit')) {
            return redirect()->route('trigger.edit', [$tid]);
        }
        else {
            abort(404);
            return;
        }
    }

    public function slotmovegroup($tid, $sid, $gid, $dir) {
        $oldOrder = DB::table('group_triggerslot')->where('group_id', $gid)->where('triggerslot_id', $sid)->pluck('order');

        if($dir == 'up') {
            if($oldOrder > 1) {
                DB::table('group_triggerslot')->where('triggerslot_id', $sid)->where('order', $oldOrder - 1)->increment('order');
                DB::table('group_triggerslot')->where('triggerslot_id', $sid)->where('group_id', $gid)->decrement('order');
            }
        }
        else if($dir == 'down') {
            if($oldOrder < TriggerSlot::findOrFail($sid)->groups()->count()) {
                DB::table('group_triggerslot')->where('triggerslot_id', $sid)->where('order', $oldOrder + 1)->decrement('order');
                DB::table('group_triggerslot')->where('triggerslot_id', $sid)->where('group_id', $gid)->increment('order');
            }
        }

        return redirect()->route('triggerslot.edit', [$tid, $sid]);
    }

    public function slotdeletegroup($tid, $sid, $gid) {
        $slot = Trigger::findOrFail($tid)->triggerslots()->findOrFail($sid);
        $slot->groups()->detach($gid);

        Session::flash('flash_message', 'Gruppe aus Alarmierung entfernt.');

        return redirect()->route('triggerslot.edit', [$tid, $sid]);
    }
}
