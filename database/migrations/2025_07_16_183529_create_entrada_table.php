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
        Schema::create('entrada', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('valor');
            $table->foreignId('categoria_id');
            $table->date('data');
            $table->foreignId('formapagamento_id');
            $table->integer('parcelamento');
            $table->char('status', 1);
            $table->foreignId('usuario_id');
            $table->boolean('despesa');
            $table->text('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada');
    }
};
