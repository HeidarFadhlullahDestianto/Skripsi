<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained('days')->onDelete('cascade');
            $table->string('title');
            $table->integer('sets');
            $table->integer('reps');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}
