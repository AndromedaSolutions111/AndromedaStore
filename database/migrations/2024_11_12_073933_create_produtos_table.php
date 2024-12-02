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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nome'); // Nome do produto
            $table->text('descricao'); // Descrição detalhada do produto
            $table->decimal('preco', 10, 2); // Preço do produto
            $table->integer('quantidade'); // Quantidade disponível
            $table->boolean('aprovado')->default(false); // Aprovação do administrador
            $table->string('foto')->nullable(); // Foto do produto
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); // FK para Usuários (vendedor)
            $table->timestamps(); // Campos de criação e atualização automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
