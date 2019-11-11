<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('employee_id')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('dob');
            $table->string('employee_type_id');
            $table->foreign('employee_type_id')->references('employee_type_id')->on('employee_types');
            $table->string('department_id');
            $table->foreign('department_id')->references('department_id')->on('employee_departments');
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
        Schema::dropIfExists('employees');
    }
}
