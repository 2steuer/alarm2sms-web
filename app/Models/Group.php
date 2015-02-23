<?php

class Group extends Eloquent {

    protected $fillable = ['name', 'description'];

    public function persons() {
        return $this->belongsToMany('Person')->withPivot(array('order'));
    }
}