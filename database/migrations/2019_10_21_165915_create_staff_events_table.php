<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_events', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date');
            $table->string('name_of_event');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type');
            
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
        Schema::dropIfExists('staff_events');
    }
}
