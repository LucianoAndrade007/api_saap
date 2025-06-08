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
        Schema::create('medidores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id')->index('idx_medidores_usuario');
            $table->integer('tipo_medidor_id')->nullable();
            $table->boolean('alcantarillado')->nullable()->default(false);
            $table->string('codigo', 100)->unique('uk_medidores_codigo');
            $table->string('codigo_casa', 20)->nullable();
            $table->boolean('activo')->default(true);
            $table->dateTime('fecha_creacion')->useCurrent();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidores');
    }
};
