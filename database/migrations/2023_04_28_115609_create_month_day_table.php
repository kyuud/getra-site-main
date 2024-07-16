<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_day', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('month');
            $table->string('day');
            $table->foreign('month')->references('month')->on('month_attendances');
            $table->foreign('day')->references('day')->on('day_attendances');
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
        Schema::dropIfExists('month_day');
    }
}
