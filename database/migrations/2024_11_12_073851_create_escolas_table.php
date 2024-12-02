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
        Schema::create('escolas', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nome'); // Nome da escola
            $table->string('sigla'); // Sigla da escola
            $table->string('endereco')->nullable(); // Endereço da escola
            $table->string('telefone')->nullable(); // Telefone de contato
            $table->string('email')->unique()->nullable(); // E-mail de contato
            $table->string('foto')->nullable(); // Foto da escola
            $table->timestamps(); // Campos de criação e atualização automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolas');
    }
};
