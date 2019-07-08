<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('details');
            $table->string('sponsors_name');
            $table->float('amount');
            $table->integer('year');
            $table->boolean('isPrivate');

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
        Schema::dropIfExists('student_scholarships');
    }
}
