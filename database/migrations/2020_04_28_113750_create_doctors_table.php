<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateDoctorsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('doctors', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('name');
                $table->string('cpf');
                $table->string('crm');
                $table->string('pis');
                $table->string('specialty');
                $table->string('uf');
                $table->bigInteger('phone');
                $table->string('email');

                $table->boolean('status')->default(1);
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
            Schema::dropIfExists('doctors');
        }
    }
