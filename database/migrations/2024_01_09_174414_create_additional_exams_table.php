<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('additional_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->string('employee_name');
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('exam_id')->unsigned();
            $table->double('exam_fee')->unsigned();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->foreign('company_id')->references('id')->on('system_companies')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams_list')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_exams');
    }
};
