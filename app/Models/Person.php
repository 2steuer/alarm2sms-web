<?php

namespace App\Models;

use Eloquent;

class Person extends Eloquent {

    protected $table = 'persons';

    protected $fillable = ['name', 'number', 'flash'];

    public function groups() {
        return $this->belongsToMany('Group');
    }
}