<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEmployeesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('employees', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->bigInteger('company_id')->unsigned();

                $table->string('name')->index();
                $table->string('occupation');
                $table->string('age');
                $table->string('rg');
                $table->string('cpf');
                $table->string('nis')->nullable();
                $table->string('matricula')->nullable();
                $table->string('sex');
                $table->date('birth');

                $table->foreign('company_id')->references('id')->on('system_companies')->onDelete('cascade');

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
            Schema::dropIfExists('employees');
            Schema::dropIfExists('system_companies');
        }
    }
