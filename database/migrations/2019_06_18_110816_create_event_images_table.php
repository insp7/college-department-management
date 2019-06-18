<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_images', function(Blueprint $table)
		{
			$table->integer('event_images_id', true);
			$table->integer('event_id');
			$table->string('event_image_path');
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
		Schema::drop('event_images');
	}

}
