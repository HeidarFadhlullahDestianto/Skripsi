<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->date('tanggal_catat');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('progress');
    }
};