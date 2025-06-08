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
        Schema::create('parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100)->unique('uk_parametros_nombre');
            $table->string('valor');
            $table->string('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->unsignedInteger('administrador_id')->nullable()->index('idx_parametros_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
