<?php

class Trigger extends Eloquent {

    public function triggerslots() {
        return $this->hasMany('TriggerSlot');
    }
}