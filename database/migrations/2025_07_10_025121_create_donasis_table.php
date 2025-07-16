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
      Schema::create('donasis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('donatur_id')->constrained('donaturs')->onDelete('cascade');
    $table->date('tanggal');
    $table->enum('jenis', ['tunai', 'transfer', 'barang']); // ✅ sudah benar, pastikan form kirim value ini
    $table->decimal('jumlah', 12, 2);
    $table->text('keterangan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
