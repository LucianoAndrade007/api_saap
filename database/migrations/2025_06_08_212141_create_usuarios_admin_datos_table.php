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
        Schema::create('usuarios_admin_datos', function (Blueprint $table) {
            $table->unsignedInteger('usuario_id')->primary();
            $table->string('imagen')->nullable();
            $table->string('ultima_ip', 45)->nullable();
            $table->boolean('es_super')->nullable()->default(false);
            $table->string('token')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_admin_datos');
    }
};
