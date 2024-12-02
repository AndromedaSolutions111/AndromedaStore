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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // Identificador único do pedido
            $table->integer('quantidade'); // Quantidade do produto no pedido
            $table->enum('status', ['pendente', 'enviado', 'concluído']); // Status do pedido
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); // FK para Usuários (comprador)
            $table->timestamp('data')->useCurrent(); // Data e hora do pedido
            $table->timestamps(); // Campos de criação e atualização automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
