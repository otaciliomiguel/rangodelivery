<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique();
            $table->integer('capacidade');
            $table->enum('status', ['disponivel', 'ocupada', 'reservada'])->default('disponivel');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
