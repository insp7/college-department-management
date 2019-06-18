<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->integer('student_id', true);
			$table->string('first_name', 50);
			$table->string('middle_name', 50);
			$table->string('last_name', 50);
			$table->bigInteger('contact_no');
			$table->date('date_of_birth');
			$table->integer('roll_no');
			$table->boolean('current_year');
			$table->boolean('current_semester');
			$table->date('year_of_admission');
			$table->date('expected_year_of_passing');
			$table->string('status', 30);
			$table->string('email', 50);
			$table->string('password', 50);
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
		Schema::drop('students');
	}

}
