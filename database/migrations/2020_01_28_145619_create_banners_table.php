<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBannersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('banners', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title', 100);
                $table->bigInteger('position');
                $table->string('url', 100);
                $table->string('image', 200)->nullable();
                $table->text('description');
                $table->boolean('status')->default(true);
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
            Schema::dropIfExists('banners');
        }
    }
