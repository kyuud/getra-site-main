<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->string('start');
            $table->string('titulo');
            $table->string('validity');
            $table->bigInteger('deadline');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('company_id')
                    ->references('id')
                    ->on('system_companies')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraisals');
    }
}
