<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('day_id');
            $table->foreignId('technician_id')->references('id')->on('health_technicians');
            $table->foreignId('hour_id')->references('id')->on('hour_attendances');
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->foreignId('modality_id')->references('id')->on('modalities');
            $table->foreignId('exam_id')->references('id')->on('exams');
            $table->boolean('accomplished')->default(0);
            $table->bigInteger('doctor_id')->unsigned();
            $table->text('observation');
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
        Schema::dropIfExists('list_attendances');
    }
}
