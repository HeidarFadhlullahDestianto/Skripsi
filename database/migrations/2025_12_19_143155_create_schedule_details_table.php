<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('schedule_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')
                ->constrained('schedules')
                ->cascadeOnDelete();

            $table->foreignId('latihan_id')
                ->constrained('latihans')
                ->cascadeOnDelete();

            $table->integer('sets');
            $table->integer('reps');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedule_details');
    }
};
