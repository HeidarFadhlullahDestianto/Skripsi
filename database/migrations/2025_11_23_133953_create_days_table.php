<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->integer('day_number'); // contoh: 1,2,3,4
            $table->string('title');       // contoh: “Dada & Tricep”
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('days');
    }
};
