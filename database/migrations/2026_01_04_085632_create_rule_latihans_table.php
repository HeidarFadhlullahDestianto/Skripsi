<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rule_latihans', function (Blueprint $table) {
            $table->id();
            $table->string('rentang_umur');
            $table->string('kategori_umur');
            $table->string('jenis_kelamin');
            $table->string('tingkat_kesulitan');
            $table->string('tujuan_latihan');
            $table->string('frekuensi');
            $table->string('hari_1')->nullable();
            $table->string('hari_2')->nullable();
            $table->string('hari_3')->nullable();
            $table->string('hari_4')->nullable();
            $table->string('hari_5')->nullable();
            $table->string('hari_6')->nullable();
            $table->string('hari_7')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rule_latihans');
    }
};
