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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('torneio_id')->constrained('torneios')->onDelete('cascade');
            $table->foreignId('jogador1_id')->constrained('jogadors')->onDelete('cascade');
            $table->foreignId('jogador2_id')->constrained('jogadors')->onDelete('cascade');
            $table->string('resultado')->nullable(); // Exemplo: "6x3 6x4"
            $table->timestamp('data_partida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
