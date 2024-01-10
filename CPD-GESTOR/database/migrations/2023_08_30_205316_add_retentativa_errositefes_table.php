<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRetentativaErrositefesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('errositefes', function (Blueprint $table) {
            $table->boolean('retentativa')->nullable()->after('descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('errositefes', function (Blueprint $table) {
            
            $table->dropColumn('retentativa');

        });
    }
}
