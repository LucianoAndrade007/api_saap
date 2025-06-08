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
        Schema::create('ingresos_egresos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_id')->index('idx_ingresos_egresos_tipo');
            $table->unsignedInteger('plan_cuenta_id')->index('idx_ingresos_egresos_cuenta');
            $table->date('fecha');
            $table->integer('monto_credito')->default(0)->comment('haber');
            $table->integer('monto_debito')->default(0)->comment('debe');
            $table->text('descripcion');
            $table->string('comprobante')->nullable();
            $table->integer('numero_documento')->nullable();
            $table->unsignedInteger('proveedor_id')->nullable()->index('idx_ingresos_egresos_proveedor');
            $table->unsignedInteger('tipo_documento_id')->nullable()->index('idx_ingresos_egresos_documento');
            $table->integer('liquidacion_id')->nullable()->index('idx_ingresos_egresos_liquidacion');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos_egresos');
    }
};
