<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublishedBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('published_books', function(Blueprint $table)
		{
			$table->integer('published_books_id', true);
			$table->integer('staff_id');
			$table->string('details');
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
		Schema::drop('published_books');
	}

}
