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
        Schema::create('infromasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('isi');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('penulis');
            $table->string('status');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infromasis');
    }
};
