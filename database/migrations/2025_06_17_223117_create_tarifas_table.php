<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id(); // id PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('categorias_usuarios_id')->nullable();
            $table->unsignedBigInteger('tipos_medidor_id')->nullable();
            $table->integer('c_f_agua');
            $table->integer('c_f_alcan');
            $table->integer('m3_agua');
            $table->integer('m3_alcan');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('actualizado_por_id');

            // Relaciones (si existen las tablas referenciadas)
            $table->foreign('categorias_usuarios_id')->references('id')->on('categorias_usuarios')->nullOnDelete();
            $table->foreign('tipos_medidor_id')->references('id')->on('tipos_medidor')->nullOnDelete();
            $table->foreign('actualizado_por_id')->references('usuario_id')->on('usuarios_admin_datos')->restrictOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarifas');
    }
}
