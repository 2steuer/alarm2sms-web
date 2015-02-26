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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');

Route::resource('persons', 'PersonsController');
Route::get('persons/{id}/delete', ['as' => 'persons.delete', 'uses'=>'PersonsController@delete']);

Route::resource('groups', 'GroupsController');
Route::get('groups/{id}/delete', ['as' => 'groups.delete', 'uses'=>'GroupsController@delete']);

Route::resource('triggers', 'TriggersController');
Route::get('triggers/{id}/delete', ['as' => 'triggers.delete', 'uses'=>'TriggersController@delete']);

Route::get('triggers/{tid}/slots/create', ['as' => 'triggerslot.create', 'uses' => 'TriggersController@createslot']);
Route::post('triggers/{tid}/slots/store', ['as' => 'triggerslot.store', 'uses' => 'TriggersController@storeslot']);
Route::get('triggers/{tid}/slots/{sid}/edit', ['as' => 'triggerslot.edit', 'uses' => 'TriggersController@editslot']);
Route::put('triggers/{tid}/slots/{sid}/update', ['as' => 'triggerslot.update', 'uses' => 'TriggersController@updateslot']);

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
