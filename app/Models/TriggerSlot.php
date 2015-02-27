<?php namespace App\Models;

use Eloquent;

class TriggerSlot extends Eloquent {

    protected $table = 'triggerslots';

    protected $fillable = ['text', 'weekday', 'start', 'end'];

    public function trigger() {
        return $this->belongsTo('App\Models\Trigger');
    }

    public function scopeDefault($query) {
        return $query->where('weekday', '=', 8);
    }

    public function scopeSpecials($query) {
        return $query->where('weekday', '<', 8);
    }

    public function groups() {
        return $this->belongsToMany('App\Models\Group', 'group_triggerslot', 'triggerslot_id')->withPivot(array('order'));
    }
}