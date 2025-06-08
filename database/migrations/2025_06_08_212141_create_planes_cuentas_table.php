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
        Schema::create('planes_cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 20)->unique('uk_planes_cuentas_codigo');
            $table->string('descripcion');
            $table->unsignedInteger('padre_id')->nullable()->index('idx_planes_cuentas_padre');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes_cuentas');
    }
};
