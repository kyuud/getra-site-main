<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateSystemCompaniesTable extends Migration
    {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('cnpj');
            $table->string('fantasyname');
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('complement')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');

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
        Schema::dropIfExists('system_companies');
    }

    }
