<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateAsosTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('asos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('employee_id')->unsigned();
                $table->bigInteger('doctor_id')->unsigned();
                $table->string('pdf');
                $table->string('digpdf');
                $table->string('xml');
                $table->boolean('status')->default(1);
                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();

                $table->foreign('employee_id')
                        ->references('id')
                        ->on('employees')
                        ->onDelete('cascade');

                $table->foreign('doctor_id')
                        ->references('id')
                        ->on('doctors')
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
            Schema::dropIfExists('asos');
            Schema::dropIfExists('employees');
            Schema::dropIfExists('doctors');
        }
    }
