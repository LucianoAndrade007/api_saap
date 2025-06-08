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
        Schema::create('cierres_cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('administrador_id')->index('idx_cierres_cajas_admin');
            $table->unsignedInteger('apertura_id')->index('idx_cierres_cajas_apertura');
            $table->integer('monto_esperado');
            $table->integer('monto_real');
            $table->integer('diferencia');
            $table->dateTime('fecha_cierre')->useCurrent();
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cierres_cajas');
    }
};
