<?php

class TriggerSlot extends Eloquent {

    public function trigger() {
        return $this->belongsTo('Trigger');
    }
}