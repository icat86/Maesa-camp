<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('date_order');
            $table->string('name');
            $table->string('company');
            $table->date('date_in');
            $table->date('date_out');
            $table->timestamps();  // Optional for created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
