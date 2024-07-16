<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->dateTime('attendance_date');
            $table->bigInteger('technician_id')->unsigned();
            $table->string('employee');
            $table->string('company');
            $table->string('cnpj');
            $table->string('occupation');
            $table->bigInteger('modality_id')->unsigned();
            $table->bigInteger('exam_id')->unsigned();
            $table->boolean('accomplished')->default(0);
            $table->bigInteger('doctor_id')->unsigned();
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('technician_id')
                ->references('id')
                ->on('health_technicians')
                ->onDelete('cascade');

            $table->foreign('modality_id')
                ->references('id')
                ->on('modalities')
                ->onDelete('cascade');

            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
                ->onDelete('cascade');

            // $table->foreign('technician_id')
            //     ->references('id')
            //     ->on('doctors')
            //     ->onDelete('cascade');

            /*  $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade'); */

            // $table->foreign('doctor_id')
            //     ->references('id')
            //     ->on('doctors')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
