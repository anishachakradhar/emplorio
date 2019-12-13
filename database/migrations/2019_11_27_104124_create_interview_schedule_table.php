<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applier_id');
            $table->foreign('applier_id')
                ->references('id')
                ->on('appliers');
            $table->date('interview_date');
            $table->time('interview_time');
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
        Schema::dropIfExists('interview_schedule');
    }
}
