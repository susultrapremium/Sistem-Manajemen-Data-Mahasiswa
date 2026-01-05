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
        Schema::create('laporans', function (Blueprint $table) {
          $table->id();
          $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
          $table->text('isi_laporan');
          $table->date('tanggal');
          $table->string('status')->default('pending');
          $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
