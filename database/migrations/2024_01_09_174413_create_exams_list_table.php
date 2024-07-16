<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exams_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->string('exam_name');
            $table->decimal('value_amount', 8, 2);
            $table->decimal('value_fee', 8, 2);
            $table->timestamps();
            $table->softDeletes();
    
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams_list');
    }
};
