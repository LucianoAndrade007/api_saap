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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('run', 20)->unique('run');
            $table->string('nombre_usuario', 100)->nullable();
            $table->string('nombres', 100);
            $table->string('apellido_paterno', 100)->nullable();
            $table->string('apellido_materno', 100)->nullable();
            $table->string('email', 150)->unique('email');
            $table->string('telefono_movil', 20)->nullable();
            $table->string('password');
            $table->boolean('activo')->nullable()->default(true);
            $table->boolean('verificado')->nullable()->default(false);
            $table->boolean('en_linea')->nullable()->default(false);
            $table->timestamp('ultimo_login')->nullable();
            $table->boolean('reset_pass')->nullable()->default(false);
            $table->string('password_reset_code', 100)->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['run'], 'uk_usuarios_run');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
