<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    class CreateCompaniesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('companies', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('street');
                $table->string('number');
                $table->string('plus');
                $table->string('neighborhood');
                $table->string('cep');
                $table->string('city');
                $table->string('state');
                $table->string('phone');
                $table->string('mobile');
                $table->string('email');
                $table->string('whatsapp')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->string('instagram')->nullable();
                $table->string('youtube')->nullable();
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
            Schema::dropIfExists('companies');
        }
    }
