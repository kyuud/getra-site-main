<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerAdditionalExamsBeforeInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DELIMITER //
            CREATE TRIGGER additional_exams_before_insert
            BEFORE INSERT ON additional_exams
            FOR EACH ROW
            BEGIN
                DECLARE value_amount DECIMAL(10, 2);

                SELECT value_fee INTO value_amount
                FROM exams_list
                WHERE id = NEW.exam_id;

                SET NEW.exam_fee = value_amount;
            END //
            DELIMITER ;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS additional_exams_before_insert');
    }
}
