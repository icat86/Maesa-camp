<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->id();
            $table->string('person_id');
            $table->string('order_by');
            $table->string('cost_code')->nullable();
            $table->text('other_requirements')->nullable();
            $table->date('date_order')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('room_type')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_out')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ins');
    }
};
