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
        Schema::table('parametros_contables', function (Blueprint $table) {
            $table->foreign(['grupo_id'], 'fk_parametros_contables_grupo')->references(['id'])->on('grupos_parametros')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parametros_contables', function (Blueprint $table) {
            $table->dropForeign('fk_parametros_contables_grupo');
        });
    }
};
