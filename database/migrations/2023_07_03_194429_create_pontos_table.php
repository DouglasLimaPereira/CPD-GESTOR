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
        Schema::create('pontos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('data');
            $table->time('entrada')->nullable();
            $table->string('comprovante1')->nullable();
            $table->time('entrada_almoco')->nullable();
            $table->string('comprovante2')->nullable();
            $table->time('saida_almoco')->nullable();
            $table->string('comprovante3')->nullable();
            $table->time('saida')->nullable();
            $table->string('comprovante4')->nullable();
            $table->time('horas_extras')->nullable();
            $table->time('horas_negativas')->nullable();
            $table->boolean('tipo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontos');
    }
};
