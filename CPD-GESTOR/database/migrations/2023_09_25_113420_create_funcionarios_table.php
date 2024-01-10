<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('funcao_id')->constrained('funcoes');
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->string('matricula');
            $table->date('data_admissao');
            $table->date('data_demissao')->nullable();
            $table->boolean('situacao_admissional')->default(true);
            $table->boolean('superadmin')->default(false);
            $table->string('imagem')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
