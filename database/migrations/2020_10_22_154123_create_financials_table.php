<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->string('city');
            $table->string('email');
            $table->string('duedate');
            $table->double('lifevalue')->nullable();
            $table->bigInteger('qtd');
            $table->double('detached')->nullable();
            $table->double('discounts');
            $table->double('fees');
            $table->text('obs')->nullable();
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
        Schema::dropIfExists('financials');
    }
}
