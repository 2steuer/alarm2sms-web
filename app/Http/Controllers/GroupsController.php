<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Models\Group;
use Request;
use App\Models\Person;
use Session;
use DB;


class GroupsController extends CrudController {

	public function __construct(Group $model) {
        $this->model = $model;
        $this->singular = 'group';
        $this->plural = 'groups';
        $this->humanName = 'Gruppe';
    }

    public function edit($id) {
        $group = Group::findOrFail($id);
        $persons = $group->persons()->orderBy('order');

        return view('groups.edit', ['group' => $group, 'persons' => $persons]);
    }

    public function addperson($gid) {
        $group = Group::findOrFail($gid);
        $person = Person::findOrFail(Request::input('person_id'));
        $pos = Request::input('order');
        $currentCount = $group->persons()->count();

        if($group->persons->contains($person)) {
            Session::flash('flash_message', 'Person ist der Gruppe bereits zugeordnet.');
            Session::flash('flash_message_class', 'alert-danger');
        }
        else {
            if($pos <= $currentCount) {
                DB::table('group_person')
                    ->where('group_id', $group->id)
                    ->where('order', '>=', $pos)
                    ->increment('order');
            }

            $group->persons()->attach($person, ['order' => $pos]);

            Session::flash('flash_message', 'Person der Gruppe hinzugefügt.');
        }

        return redirect()->route('groups.edit', [$gid]);
    }

    public function deleteperson($gid, $pid) {
        $group = Group::findOrFail($gid);
        $group->persons()->detach($pid);

        Session::flash('flash_message', 'Person aus Gruppe entfernt.');

        return redirect()->route('groups.edit', [$gid]);
    }

    public function moveperson($gid, $pid, $direction) {
        $oldOrder = DB::table('group_person')
            ->where('group_id', $gid)
            ->where('person_id', $pid)
            ->pluck('order');

        $count = Group::findOrFail($gid)->persons()->count();

        if($direction == 'up' && $oldOrder - 1) {
            DB::table('group_person')
                ->where('group_id', $gid)
                ->where('order', $oldOrder - 1)
                ->increment('order');

            DB::table('group_person')
                ->where('group_id', $gid)
                ->where('person_id', $pid)
                ->decrement('order');
        }
        else if($direction == 'down' && $oldOrder < $count) {
            DB::table('group_person')
                ->where('group_id', $gid)
                ->where('order', $oldOrder + 1)
                ->decrement('order');

            DB::table('group_person')
                ->where('group_id', $gid)
                ->where('person_id', $pid)
                ->increment('order');
        }

        return redirect()->route('groups.edit', [$gid]);
    }

    public function beforeDelete($obj) {
        DB::table('group_triggerslot')
            ->where('group_id', $obj->id)->delete();
    }

}
