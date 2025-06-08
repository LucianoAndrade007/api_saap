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
        Schema::create('dispositivos_moviles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100)->nullable();
            $table->string('numero_telefono', 20)->nullable();
            $table->string('imei', 20)->nullable()->unique('uk_dispositivos_moviles_imei');
            $table->string('gmail', 100)->nullable();
            $table->string('contrasena', 100)->nullable();
            $table->string('ubicacion', 100)->nullable();
            $table->dateTime('ultima_conexion')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('administrador_id')->nullable()->index('idx_dispositivos_moviles_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos_moviles');
    }
};
