<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('name')->nullable();
            $table->bigInteger('cnpj_cpf')->unsigned();
            $table->double('comission')->nullable();
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
        Schema::dropIfExists('accountant');
    }
}
