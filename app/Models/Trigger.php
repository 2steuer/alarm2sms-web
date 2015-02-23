<?php

namespace App\Models;

use Eloquent;

class Trigger extends Eloquent {

    protected $fillable = ['name', 'description', 'trigger_text'];

    public function triggerslots() {
        return $this->hasMany('TriggerSlot');
    }
}