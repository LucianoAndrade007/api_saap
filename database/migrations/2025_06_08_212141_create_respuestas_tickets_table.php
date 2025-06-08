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
        Schema::create('respuestas_tickets', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('ticket_id')->index('idx_respuestas_tickets_ticket');
            $table->unsignedInteger('administrador_id')->index('idx_respuestas_tickets_admin');
            $table->text('respuesta');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_tickets');
    }
};
