<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerUpdateFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER financials_update_fees_after_insert_or_update
            AFTER INSERT ON additional_exams
            FOR EACH ROW
            BEGIN
                UPDATE financials f
                SET f.fees = (f.lifevalue * f.qtd) - f.discounts + 
                             (SELECT SUM(a.exam_fee) 
                              FROM additional_exams a 
                              WHERE a.company_id = f.company_id);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_fees_after_insert_or_update');
    }
}
