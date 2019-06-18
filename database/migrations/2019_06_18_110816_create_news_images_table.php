<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_images', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('news_id');
			$table->string('news_image_path');
            $table->json('additional_columns');

			$table->timestamps();
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news_images');
	}

}
