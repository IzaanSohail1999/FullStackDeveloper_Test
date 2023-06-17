<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HumanResourceContextDbStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create employees tables
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age');
            $table->timestamps();
        });

        // Create locations table
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('zip_code')->unique();
            $table->string('address');
            $table->timestamps();
        });

        // Create shifts table
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('label');
            $table->integer('duration');
            $table->timestamps();
        });

        // Create schedules table
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('shift_id');
            $table->date('date');
            $table->string('notes')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('shift_id')->references('id')->on('shifts');
        });

        // Create attendance table
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('schedule_id');
            $table->boolean('present')->default(false);
            $table->date('date');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });


        // Create attendance_faults table
        Schema::create('attendance_faults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('attendance_id');
            $table->text('reason');
            $table->date('date');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('attendance_id')->references('id')->on('attendance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop tables in reverse order
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('attendance_faults');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('employees');
    }
}
