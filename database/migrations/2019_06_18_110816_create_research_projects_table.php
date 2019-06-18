<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResearchProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('research_projects', function(Blueprint $table)
		{
			$table->integer('research_projects_id', true);
			$table->integer('staff_id');
			$table->string('principal_investigator', 50);
			$table->string('grant_details');
			$table->string('title');
			$table->integer('amount');
			$table->date('year');
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
		Schema::drop('research_projects');
	}

}
