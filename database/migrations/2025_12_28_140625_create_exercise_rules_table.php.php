<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('exercise_rules', function (Blueprint $table) {
            $table->id();
            $table->string('usia');
            $table->string('jenis_kelamin');
            $table->string('tujuan');
            $table->integer('frekuensi');
            $table->string('tingkat');
            $table->string('hari');
            $table->string('otot');
            $table->string('nama_latihan');
            $table->integer('set');
            $table->integer('reps');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercise_rules');
    }
};
