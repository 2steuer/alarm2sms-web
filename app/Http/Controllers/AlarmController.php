<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Request;
use \App\Models\Trigger;

class AlarmController extends Controller {


    public function index() {
        if(!Auth::user()->admin) {
            $triggers = Auth::user()->allowedTriggers()->get();
        }
        else {
            $triggers = Trigger::all();
        }


        return view('alarm.index', ['triggers' => $triggers]);
    }

    public function standard($id) {
        $user = Auth::user();

        if($user->admin) {
            $trigger = Trigger::findOrFail($id);
        }
        else {
            $trigger = $user->allowedTriggers()-findOrFail($id);
        }

        return view('alarm.triggerstandard', ['trigger' => $trigger]);
    }

    public function freetext($id) {
        $user = Auth::user();

        if($user->admin) {
            $trigger = Trigger::findOrFail($id);
        }
        else {
            $trigger = $user->allowedTriggers()-findOrFail($id);
        }

        return view('alarm.triggerfreetext', ['trigger' => $trigger]);
    }

    public function trigger(\Illuminate\Http\Request $request, $id, $mode) {
        $user = Auth::user();

        if($user->admin) {
            $trigger = Trigger::findOrFail($id);
        }
        else {
            $trigger = $user->allowedTriggers()->findOrFail($id);
        }

        if($mode == 'freetext') {
            $this->validate($request, ['text' => 'required|min:5']);
        }

        Session::flash('flash_message', "Auslöser ". $trigger->name." alarmiert.");

        return redirect()->route('alarm.index');
    }
}
