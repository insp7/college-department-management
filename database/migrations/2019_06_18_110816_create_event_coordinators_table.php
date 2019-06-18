<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventCoordinatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_coordinators', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('event_id');
			$table->integer('staff_id');
			$table->timestamps();
            $table->text('additional_columns');

            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->softDeletes();


		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_coordinators');
	}

}
