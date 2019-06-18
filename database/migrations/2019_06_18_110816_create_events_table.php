<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name');
			$table->text('details');
			$table->text('address');
			$table->text('type');
			$table->integer('institute_funding');
			$table->integer('sponsor_funding');
			$table->integer('expenditure');
			$table->date('start_date');
			$table->integer('end_date');
			$table->integer('internal_participants_count');
			$table->integer('external_participants_count');
            $table->boolean('is_completed');

            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
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
		Schema::drop('events');
	}

}
