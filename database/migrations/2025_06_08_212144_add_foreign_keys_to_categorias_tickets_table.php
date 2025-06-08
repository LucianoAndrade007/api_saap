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
        Schema::table('categorias_tickets', function (Blueprint $table) {
            $table->foreign(['departamento_id'], 'fk_categorias_tickets_departamento')->references(['id'])->on('departamentos_tickets')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categorias_tickets', function (Blueprint $table) {
            $table->dropForeign('fk_categorias_tickets_departamento');
        });
    }
};
