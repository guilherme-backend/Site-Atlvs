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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Dono do chamado
        $table->string('subject'); // Assunto (ex: Erro no Login)
        $table->text('message'); // Descrição do problema
        $table->enum('status', ['aberto', 'respondido', 'resolvido'])->default('aberto');
        $table->enum('priority', ['baixa', 'media', 'alta'])->default('baixa');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
