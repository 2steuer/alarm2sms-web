<?php

class Group extends Eloquent {

    public function persons() {
        return $this->belongsToMany('Person')->withPivot(array('order'));
    }
}