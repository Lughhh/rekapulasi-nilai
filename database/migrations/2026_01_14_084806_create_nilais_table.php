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
        Schema::create('nilai', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kelas_id')->constrained()->cascadeOnDelete();
        $table->foreignId('mahasiswa_id')->constrained('users')->cascadeOnDelete();
        $table->float('tugas');
        $table->float('kuis');
        $table->float('uts');
        $table->float('uas');
        $table->float('nilai_akhir');
        $table->string('grade');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
