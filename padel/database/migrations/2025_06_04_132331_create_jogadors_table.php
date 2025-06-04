<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jogadors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('genero', ['masculino', 'feminino', 'misto']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jogadors');
    }
};
