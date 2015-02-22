<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('persons', function(Blueprint $table) {
                $table->timestamps();
            });

        Schema::table('groups', function(Blueprint $table) {
                $table->timestamps();
            });

        Schema::table('triggers', function(Blueprint $table) {
                $table->timestamps();
            });

        Schema::table('triggerslots', function(Blueprint $table) {
                $table->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('persons', function(Blueprint $table) {
                $table->removeColumn('updated_at');
                $table->removeColumn('created_at');
            });

        Schema::table('groups', function(Blueprint $table) {
                $table->removeColumn('updated_at');
                $table->removeColumn('created_at');
            });

        Schema::table('triggers', function(Blueprint $table) {
                $table->removeColumn('updated_at');
                $table->removeColumn('created_at');
            });

        Schema::table('triggerslots', function(Blueprint $table) {
                $table->removeColumn('updated_at');
                $table->removeColumn('created_at');
            });
	}

}
