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
        Schema::table('entradas', function (Blueprint $table) {
            $table->foreignId('formapagamento_id')->nullable()->change();
            $table->foreignId('user_id')->nullable()->change();
            $table->integer('parcelamento')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entradas', function (Blueprint $table) {
            $table->foreignId('formapagamento_id')->nullable(false)->change();
            $table->foreignId('user_id')->nullable(false)->change();
            $table->integer('parcelamento')->nullable(false)->change();
        });
    }
};
