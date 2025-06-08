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
        Schema::table('pagos_dte_datos', function (Blueprint $table) {
            $table->foreign(['id'], 'fk_pagos_dte_datos_pagos')->references(['id'])->on('pagos')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos_dte_datos', function (Blueprint $table) {
            $table->dropForeign('fk_pagos_dte_datos_pagos');
        });
    }
};
