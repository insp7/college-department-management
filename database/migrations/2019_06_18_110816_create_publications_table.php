<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id');
			$table->date('year');
			$table->text('title');
			$table->string('journal', 50);
			$table->boolean('is_ugc_approved', 1)->default('b\'0\'');
			$table->string('citation');
			$table->timestamps();
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->boolean('is_deleted', 1)->default('b\'0\'');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publications');
	}

}
