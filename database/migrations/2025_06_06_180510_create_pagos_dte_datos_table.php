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
        Schema::create('pagos_dte_datos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_folio');
            $table->mediumText('timbre')->nullable();
            $table->bigInteger('numero_resolucion')->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->dateTime('fecha_creacion')->useCurrent();
            $table->text('token')->nullable();
            $table->binary('pdf')->nullable();
            $table->boolean('es_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_dte_datos');
    }
};
