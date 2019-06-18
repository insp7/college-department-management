<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_activity', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('is_staff')->default(1); // Why is this 1
			$table->text('activity_details');
            $table->json('additional_columns');

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
		Schema::drop('user_activity');
	}

}
