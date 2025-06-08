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
        Schema::create('aperturas_cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('administrador_id')->index('idx_aperturas_cajas_admin');
            $table->integer('monto');
            $table->dateTime('fecha_apertura')->useCurrent();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aperturas_cajas');
    }
};
