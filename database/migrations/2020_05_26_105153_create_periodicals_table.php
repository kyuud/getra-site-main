<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePeriodicalsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('periodicals', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('employee_id')->unsigned();
                $table->string('pdf');
                $table->boolean('status')->default(1);
                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();


                $table->foreign('employee_id')
                        ->references('id')
                        ->on('employees')
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
            Schema::dropIfExists('periodicals');
            Schema::dropIfExists('employees');

        }
    }
