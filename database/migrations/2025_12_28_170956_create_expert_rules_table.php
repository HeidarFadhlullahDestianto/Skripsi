<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rentang_umur');
            $table->string('kategori_umur');
            $table->string('jenis_kelamin');
            $table->string('tingkat_kesulitan');
            $table->string('tujuan_latihan');
            $table->string('frekuensi');
        
            $table->string('hari_1');
            $table->string('hari_2');
            $table->string('hari_3');
            $table->string('hari_4');
            $table->string('hari_5');
            $table->string('hari_6');
            $table->string('hari_7');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_rules');
    }
};
