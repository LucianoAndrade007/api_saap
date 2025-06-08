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
        Schema::create('acceso_modulo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('modulo_id')->index('idx_acceso_modulo_modulo');
            $table->string('operacion')->nullable();

            $table->unique(['roles_id', 'modulo_id'], 'uk_acceso_modulo_rol_modulo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceso_modulo');
    }
};
