<?php namespace App;

use App\Models\Group;
use App\Models\Person;

class Helper {
    protected $weekdays = array(
        1 => 'Montag',
        2 => 'Dienstag',
        3 => 'Mittwoch',
        4 => 'Donnerstag',
        5 => 'Freitag',
        6 => 'Samstag',
        7 => 'Sonntag');

    public function getWeekday($num) {
        return $this->weekdays[$num];
    }

    public function getWeekdays() {
        return $this->weekdays;
    }

    public function getGroups($ignoreGroups) {
        return Group::orderBy('name', 'asc')->get()->diff($ignoreGroups)->lists('name', 'id');
    }

    public function getPersons($excludePersons) {
        return Person::orderBy('name', 'asc')->get()->diff($excludePersons)->lists('name', 'id');
    }

    public function getPositionStrings($maxPosition) {
        $ret = array();
        for($i = 1; $i <= $maxPosition; $i++) {
            $ret[$i] = 'Position '. $i;
        }
        return $ret;
    }
}