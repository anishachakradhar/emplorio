<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name');
            $table->string('email');
            $table->integer('contact_no');
            $table->string('area_applied');
            $table->longText('cover_letter');
            $table->longText('expectation');
            $table->string('required_by_college')->default('Yes');
            $table->string('apply_by')->default('direct');
            $table->string('CV')->default('No files uploaded.');
            $table->date('earliest_date');
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
        Schema::dropIfExists('appliers');
    }
}
