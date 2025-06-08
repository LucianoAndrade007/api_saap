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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_tickets_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['asignado_a'], 'fk_tickets_asignado')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['categoria_id'], 'fk_tickets_categoria')->references(['id'])->on('categorias_tickets')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['departamento_id'], 'fk_tickets_departamento')->references(['id'])->on('departamentos_tickets')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['estado_id'], 'fk_tickets_estado')->references(['id'])->on('estados_tickets')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['prioridad_id'], 'fk_tickets_prioridad')->references(['id'])->on('prioridades_tickets')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('fk_tickets_admin');
            $table->dropForeign('fk_tickets_asignado');
            $table->dropForeign('fk_tickets_categoria');
            $table->dropForeign('fk_tickets_departamento');
            $table->dropForeign('fk_tickets_estado');
            $table->dropForeign('fk_tickets_prioridad');
        });
    }
};
