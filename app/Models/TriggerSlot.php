<?php namespace App\Models;

use Eloquent;

class TriggerSlot extends Eloquent {

    protected $table = 'triggerslots';

    protected $fillable = ['text', 'weekday', 'start', 'end'];

    public function trigger() {
        return $this->belongsTo('App\Models\Trigger');
    }
}