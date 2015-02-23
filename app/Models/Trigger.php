<?php

namespace App\Models;

use Eloquent;
use \App\Models\TriggerSlot;

class Trigger extends Eloquent {

    protected $fillable = ['name', 'description', 'trigger_text'];

    public function triggerslots() {
        return $this->hasMany('\App\Models\TriggerSlot');
    }
}