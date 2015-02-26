<?php namespace App;

class HelperFacade extends \Illuminate\Support\Facades\Facade {
    protected static function getFacadeAccessor() { return 'helper'; }
}