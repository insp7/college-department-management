<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_lectures', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date');
            $table->string('subject');
            $table->string('class');
            $table->integer('no_of_students');
            $table->string('expert_name');
            $table->string('expert_profile');
            $table->string('organization');
            $table->string('report_path');

            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            
            $table->timestamps();
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
        Schema::dropIfExists('staff_lectures');
    }
}
