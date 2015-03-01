<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return redirect()->route('alarm.index');
});

//Everyone can login

Route::get('users/login', ['as' => 'users.loginform', 'uses' => 'UsersController@loginForm']);
Route::post('users/login', ['as' => 'users.login', 'uses' => 'UsersController@login']);

//For the rest, Authentication is required...
Route::group(['middleware' => 'auth'], function() {
    Route::get('users/logout', ['as' => 'users.logout', 'uses' => 'UsersController@logout']);

    // Low level Management needs Admin privileges
    Route::group(['middleware' => 'admin'], function() {
        Route::resource('users', 'UsersController');
        Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);

        Route::resource('triggers', 'TriggersController');
        Route::get('triggers/{id}/delete', ['as' => 'triggers.delete', 'uses'=>'TriggersController@delete']);

        Route::get('triggers/{tid}/slots/create', ['as' => 'triggerslot.create', 'uses' => 'TriggersController@createslot']);
        Route::post('triggers/{tid}/slots/store', ['as' => 'triggerslot.store', 'uses' => 'TriggersController@storeslot']);
        Route::get('triggers/{tid}/slots/{sid}/edit', ['as' => 'triggerslot.edit', 'uses' => 'TriggersController@editslot']);
        Route::put('triggers/{tid}/slots/{sid}', ['as' => 'triggerslot.update', 'uses' => 'TriggersController@updateslot']);
        Route::get('triggers/{tid}/slots/{sid}/delete', ['as' => 'triggerslot.delete', 'uses' => 'TriggersController@deleteslot']);
        Route::delete('triggers/{tid}/slots/{sid}', ['as' => 'triggerslot.destroy', 'uses' => 'TriggersController@destroyslot']);

        Route::put('triggers/{tid}/slots/{sid}/addgroup', ['as' => 'triggerslot.addgroup', 'uses' => 'TriggersController@slotaddgroup']);
        Route::get('triggers/{tid}/slots/{sid}/movegroup/{gid}/{direction}/{backPage}', ['as' => 'triggerslot.movegroup', 'uses' => 'TriggersController@slotmovegroup']);
        Route::get('triggers/{tid}/slots/{sid}/deletegroup/{gid}/{backPage}', ['as' => 'triggerslot.deletegroup', 'uses' => 'TriggersController@slotdeletegroup']);
    });

    //Some users may edit Groups and Users
    Route::group(['middleware' => 'editusers'], function() {
        Route::resource('persons', 'PersonsController');
        Route::get('persons/{id}/delete', ['as' => 'persons.delete', 'uses'=>'PersonsController@delete']);

        Route::resource('groups', 'GroupsController');
        Route::get('groups/{id}/delete', ['as' => 'groups.delete', 'uses'=>'GroupsController@delete']);

        Route::put('groups/{gid}/persons/add', ['as' => 'groups.addperson', 'uses' => 'GroupsController@addperson']);
        Route::get('groups/{gid}/persons/{pid}/move/{dir}', ['as' => 'groups.moveperson', 'uses' => 'GroupsController@moveperson']);
        Route::get('groups/{gid}/persons/{pid}/delete', ['as' => 'groups.deleteperson', 'uses' => 'GroupsController@deleteperson']);

    });

    Route::get('alarm', ['as' => 'alarm.index', 'uses' => 'AlarmController@index']);
    Route::post('alarm/trigger/{id}/{mode}', ['as' => 'alarm.trigger', 'uses' => 'AlarmController@trigger']);
    Route::get('alarm/{id}/free', ['as' => 'alarm.freetext', 'uses' => 'AlarmController@freetext']);
    Route::get('alarm/{id}', ['as' => 'alarm.standart', 'uses' => 'AlarmController@standard']);

});