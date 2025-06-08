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
        Schema::create('elementos_inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('administrador_id')->index('idx_elementos_inventarios_admin');
            $table->unsignedInteger('area_id')->index('idx_elementos_inventarios_area');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->date('fecha_compra');
            $table->integer('cantidad')->default(1);
            $table->integer('precio_unitario')->nullable();
            $table->string('estado', 50)->nullable()->default('bueno');
            $table->timestamps();
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_inventarios');
    }
};
