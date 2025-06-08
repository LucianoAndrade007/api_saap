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
        Schema::table('respuestas_tickets', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_respuestas_tickets_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ticket_id'], 'fk_respuestas_tickets_ticket')->references(['id'])->on('tickets')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuestas_tickets', function (Blueprint $table) {
            $table->dropForeign('fk_respuestas_tickets_admin');
            $table->dropForeign('fk_respuestas_tickets_ticket');
        });
    }
};
