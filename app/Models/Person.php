<?php

class Person extends Eloquent {

    public function groups() {
        return $this->belongsToMany('Group');
    }
}