<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lrn');
            $table->string('status');
            $table->string('grd_lv_enroll');
            $table->string('curriculum');
            $table->string('lastSchoolAtt');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('dateBirth');
            $table->string('gender');
            $table->bigInteger('contactNo');
            $table->string('region');
            $table->string('province');
            $table->string('town');
            $table->string('barangay');
            $table->string('fatherName')->nullable();
            $table->bigInteger('fatherContact')->nullable();
            $table->string('motherName')->nullable();
            $table->bigInteger('motherContact')->nullable();
            $table->string('guardianName')->nullable();
            $table->bigInteger('guardianContact')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('students');
    }
}
