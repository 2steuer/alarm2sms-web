<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Request;
use \App\Models\Trigger;

use GuzzleHttp\Client;

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

        $trigger = null;

        if($user->admin) {
            $trigger = Trigger::findOrFail($id);
        }
        else {
            $trigger = $user->allowedTriggers()->findOrFail($id);
        }



        return view('alarm.triggerstandard', ['trigger' => $trigger]);
    }

    public function freetext($id) {
        $user = Auth::user();

        if($user->admin) {
            $trigger = Trigger::findOrFail($id);
        }
        else {
            $trigger = $user->allowedTriggers()->findOrFail($id);
        }

        return view('alarm.triggerfreetext', ['trigger' => $trigger]);
    }

    public function trigger(\Illuminate\Http\Request $requestNode, $id, $mode) {
        $user = Auth::user();

        if($user->admin) {
            $trigger = Trigger::findOrFail($id);
        }
        else {
            $trigger = $user->allowedTriggers()->findOrFail($id);
        }


        $dom = new \DOMDocument();
        $root = $dom->createElement("Request");
        $root->appendChild($dom->createElement('ApiKey', env('ALARM_API_KEY')));
        $root->appendChild($dom->createElement('Type', 'TriggerRequest'));

        $requestNode = $dom->createElement("TriggerRequest");
        $requestNode->appendChild($dom->createElement('TriggerText', $trigger->trigger_text));

        if($mode == 'freetext') {
            $this->validate($request, ['text' => 'required|min:5']);
            $requestNode->appendChild($dom->createElement('SendDefaultMessage', 'False'));
            $requestNode->appendChild($dom->createElement('Message', $requestNode->get('text')));
        }
        $root->appendChild($requestNode);
        $dom->appendChild($root);

        $http = env('ALARM_SERVER');
        $user = env('ALARM_USER');
        $pass = env('ALARM_PASS');

        $client = new Client();
        $triggerRequest = $client->post($http, ['auth' => [$user, $pass], 'body' => $dom->saveXML()]);

        if($triggerRequest->getStatusCode() == 200)
        {
            Session::flash('flash_message', "Auslöser ". $trigger->name." alarmiert.");
        }
        else
        {
            Session::flash('flash_message', "Fehler beim Auslösen!");
        }

        return redirect()->route('alarm.index');
    }
}
