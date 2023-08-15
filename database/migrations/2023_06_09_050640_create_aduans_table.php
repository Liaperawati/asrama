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
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('jenis_aduan_id')->nullable()->constrained('jenis_aduans')->nullOnDelete();
            $table->string('isi_aduan')->nullable();
            $table->string('foto_aduan')->nullable();
            $table->enum('status', ['belum dibaca', 'sudah dibaca']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduans');
    }
};
