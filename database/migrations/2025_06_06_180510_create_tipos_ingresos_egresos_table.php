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
        Schema::create('tipos_ingresos_egresos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->boolean('es_ingreso')->comment('TRUE: Ingreso, FALSE: Egreso');
            $table->string('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_ingresos_egresos');
    }
};
