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
            $table->string('nome_produto');
            $table->integer('codigo_produto');
            $table->text('descricao')->nullable();
            $table->integer('quantidade')->default(0);
            $table->decimal('preco_unitario', 10, 2)->default(0);
            $table->string('fornecedor')->nullable();
            $table->string('categoria')->nullable();
            $table->date('data_entrada')->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};