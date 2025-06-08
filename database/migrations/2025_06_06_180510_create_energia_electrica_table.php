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
        Schema::create('energia_electrica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medidor_energia');
            $table->dateTime('fecha')->useCurrent()->index('idx_energia_electrica_fecha');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energia_electrica');
    }
};
