<?php namespace App\Models;

use Eloquent;

class TriggerSlot extends Eloquent {

    public function trigger() {
        return $this->belongsTo('Trigger');
    }
}