<?php

namespace App\Models;

use Eloquent;

class Person extends Eloquent {

    protected $table = 'persons';

    public function groups() {
        return $this->belongsToMany('Group');
    }
}