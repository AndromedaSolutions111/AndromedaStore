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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nome'); // Nome do usuário
            $table->string('email')->unique(); // E-mail do usuário (para login)
            $table->string('senha'); // Senha criptografada
            $table->string('telefone')->unique();
            $table->enum('tipo', ['estudante', 'administradorSistema', 'administradorInterno'])->default('estudante'); // Tipo de usuário
            $table->enum('classe', ['1', '2', '3', '4', '5'])->nullable(); // Classe (ano acadêmico)
            $table->string('turma')->nullable(); // Turma do usuário
            $table->string('sala')->nullable(); // Sala do usuário
            $table->string('foto')->nullable(); // Foto do usuário
            $table->enum('periodo', ['manhã', 'tarde', 'noite'])->nullable(); // Período do usuário
            $table->foreignId('escola_id')->constrained('escolas')->onDelete('cascade'); // FK para Escolas
            $table->timestamps(); // Campos de criação e atualização automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
