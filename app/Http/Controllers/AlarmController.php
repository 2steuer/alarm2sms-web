<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Request;

class AlarmController extends Controller {


    public function index() {
        $triggers = Auth::user()->allowedTriggers()->get();

        return view('alarm.index', ['triggers' => $triggers]);
    }
}
