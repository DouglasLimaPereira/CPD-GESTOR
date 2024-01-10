<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessomaxiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessomaxipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filial_id')->constrained('filiais');
            $table->string('cod_gm')->nullable();
            $table->string('nome');
            $table->string('login');
            $table->string('senha');
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
        Schema::dropIfExists('acessomaxipos');
    }
}
