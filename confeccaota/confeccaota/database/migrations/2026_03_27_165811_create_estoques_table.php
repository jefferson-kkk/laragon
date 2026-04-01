<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            
            // A "ponte" para o produto:
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade'); 
            
            // Novos campos baseados na lógica de Movimentação (Entrada/Saída)
            $table->integer('quantidade');
            $table->string('tipo_movimentacao')->default('saida');
            $table->string('observacao')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};