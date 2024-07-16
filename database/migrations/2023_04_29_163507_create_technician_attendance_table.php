<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicianAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technician_attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('technician_id')->references('id')->on('health_technicians');
            $table->foreignId('attendance_id')->references('id')->on('list_attendances');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technician_attendance');
    }
}
