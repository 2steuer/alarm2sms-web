<?php namespace App;

use App\Models\Group;

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

    public function getGroups() {
        return Group::orderBy('name', 'asc')->lists('name', 'id');
    }
}