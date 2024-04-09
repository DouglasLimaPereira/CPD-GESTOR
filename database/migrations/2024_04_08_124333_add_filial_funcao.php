<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilialFuncao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('funcoes', function (Blueprint $table) {
        //     $table->foreignId('filial_id')->constrained('filiais');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('funcoes', function (Blueprint $table) {
        //     $table->dropForeign('filial_id');
        //     $table->dropColumn('filial_id');
        // });
    }
}
