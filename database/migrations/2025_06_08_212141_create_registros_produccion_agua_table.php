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
        Schema::create('registros_produccion_agua', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('administrador_id')->index('idx_registros_produccion_agua_admin');
            $table->dateTime('fecha')->useCurrent()->index('idx_registros_produccion_agua_fecha');
            $table->integer('horometro_bomba')->comment('horómetro bomba 1');
            $table->integer('caudal_macromedida')->comment('macromedida caudal 1');
            $table->integer('horometro_bomba2')->comment('horómetro bomba 2');
            $table->integer('caudal_macromedida2')->comment('macromedida caudal 2');
            $table->integer('horometro_bomba3')->default(0)->comment('horómetro bomba 3');
            $table->integer('caudal_macromedida3')->default(0)->comment('macromedida caudal 3');
            $table->boolean('activo')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_produccion_agua');
    }
};
