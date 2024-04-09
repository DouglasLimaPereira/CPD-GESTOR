<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilialInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pontos', function (Blueprint $table) {
            $table->foreignId('filial_id')->constrained('filiais')->after('id');
        });
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->foreignId('filial_id')->constrained('filiais')->after('id');
        });
        Schema::table('escalas', function (Blueprint $table) {
            $table->foreignId('filial_id')->constrained('filiais')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pontos', function (Blueprint $table) {
            $table->dropForeign('filial_id');
            $table->dropColumn('filial_id');
        });
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign('filial_id');
            $table->dropColumn('filial_id');
        });
        Schema::table('escalas', function (Blueprint $table) {
            $table->dropForeign('filial_id');
            $table->dropColumn('filial_id');
        });
    }
}
