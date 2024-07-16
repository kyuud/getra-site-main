<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearMonthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_month', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('month');
            $table->foreign('year')->references('year')->on('year_attendances');
            $table->foreign('month')->references('month')->on('month_attendances');
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
        Schema::dropIfExists('year_month');
    }
}
