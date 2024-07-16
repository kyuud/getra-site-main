    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePermissionsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('permissions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 50);
                $table->string('label', 200);
                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();
            });

            Schema::create('permission_role', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('permission_id')->unsigned();
                $table->bigInteger('role_id')->unsigned();

                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();

                $table->foreign('permission_id')
                        ->references('id')
                        ->on('permissions')
                        ->onDelete('cascade');

                $table->foreign('role_id')
                        ->references('id')
                        ->on('roles')
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
            Schema::dropIfExists('permission_role');
            Schema::dropIfExists('permissions');
        }
    }
