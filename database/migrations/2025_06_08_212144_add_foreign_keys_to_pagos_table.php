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
        Schema::table('pagos', function (Blueprint $table) {
            $table->foreign(['consumo_id'], 'fk_pagos_consumo')->references(['id'])->on('registros_consumos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['estado_id'], 'fk_pagos_estado')->references(['id'])->on('estados_pagos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['metodo_pago_id'], 'fk_pagos_metodo_pago')->references(['id'])->on('metodos_pagos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_pagos_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('fk_pagos_consumo');
            $table->dropForeign('fk_pagos_estado');
            $table->dropForeign('fk_pagos_metodo_pago');
            $table->dropForeign('fk_pagos_usuario');
        });
    }
};
