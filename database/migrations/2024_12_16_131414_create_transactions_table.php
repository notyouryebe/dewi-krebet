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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama
            $table->string('institution'); // Instansi
            $table->string('activity'); // Kegiatan
            $table->enum('type', ['income', 'expense']); // Jenis: pemasukan/pengeluaran
            $table->decimal('amount', 15, 2); // Nominal
            $table->timestamps(); // Waktu input
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
