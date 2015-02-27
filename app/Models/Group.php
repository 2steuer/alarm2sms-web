<?php

namespace App\Models;

use Eloquent;

class Group extends Eloquent {

    protected $fillable = ['name', 'description'];

    public function persons() {
        return $this->belongsToMany('\App\Models\Person')->withPivot(array('order'));
    }
}