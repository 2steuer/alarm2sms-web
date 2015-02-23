<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstInstall extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('persons', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('number');
                $table->boolean('flash');
                $table->timestamps();
            });

        Schema::create('groups', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description');
                $table->timestamps();
            });

        Schema::create('group_person', function(Blueprint $table) {
                $table->integer('group_id')->unsigned();
                $table->integer('person_id')->unsigned();
                $table->integer('order');
                $table->foreign('group_id')->references('id')->on('groups');
                $table->foreign('person_id')->references('id')->on('persons');
            });

        Schema::create('triggers', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description');
                $table->text('trigger_text');
                $table->timestamps();
            });

        Schema::create('triggerslots', function(Blueprint $table) {
                $table->increments('id');
                $table->text('text');
                $table->integer('weekday');
                $table->time('start');
                $table->time('end');
                $table->integer('trigger_id')->unsigned()->nullable()->default(null);
                $table->foreign('trigger_id')->references('id')->on('triggers');
                $table->timestamps();
            });

        Schema::create('group_triggerslot', function(Blueprint $table) {
                $table->integer('group_id')->unsigned();
                $table->integer('triggerslor_id')->unsigned();
                $table->integer('order');
                $table->foreign('group_id')->references('id')->on('groups');
            });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('group_person');
        Schema::drop('group_triggerslot');
        Schema::drop('triggerslots');
        Schema::drop('trigger');
        Schema::drop('groups');
        Schema::drop('persons');
	}

}
