<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Usuarios\UserController;
use App\Http\Controllers\Usuarios\RoleController;
use Illuminate\Http\Request;



// Autenticación
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    /*
    |--------------------------------------------------------------------------
    | 👤 Usuarios y Administración
    |--------------------------------------------------------------------------
    */
    Route::apiResource('usuarios', \App\Http\Controllers\Usuarios\UserController::class);
    Route::put('/usuarios/{id}/restaurar', [UserController::class, 'restaurar']);
    Route::get('/usuarios-eliminados', [UserController::class, 'eliminados']);

    Route::apiResource('admins', \App\Http\Controllers\Usuarios\AdminController::class);// pendiente ya que es una parte de usuarios **

    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::put('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
    Route::put('/roles/{id}/restaurar', [RoleController::class, 'restaurar']);
    Route::get('/roles-eliminados', [RoleController::class, 'eliminados']);

    Route::apiResource('tipos-usuarios', \App\Http\Controllers\Usuarios\TipoUsuarioController::class);
    Route::apiResource('usuarios-suspendidos', \App\Http\Controllers\Usuarios\UsuarioSuspendidoController::class);
    Route::apiResource('rutas', \App\Http\Controllers\Usuarios\RutaController::class);


    /*
    |--------------------------------------------------------------------------
    | 💧 Agua y Consumo
    |--------------------------------------------------------------------------
    */
    Route::apiResource('consumos', \App\Http\Controllers\Agua\ConsumoController::class);
    Route::apiResource('medidores', \App\Http\Controllers\Agua\MedidorController::class);
    Route::apiResource('produccion-agua', \App\Http\Controllers\Agua\ProduccionAguaController::class);
    Route::apiResource('repactaciones', \App\Http\Controllers\Agua\RepactacionController::class);
    Route::apiResource('convenios', \App\Http\Controllers\Agua\ConvenioController::class);
    Route::apiResource('subsidios', \App\Http\Controllers\Agua\SubsidioController::class);
    Route::apiResource('historial-pagos', \App\Http\Controllers\Agua\PagosController::class);

    /*
    |--------------------------------------------------------------------------
    | 💰 Finanzas
    |--------------------------------------------------------------------------
    */
    Route::apiResource('cajas', \App\Http\Controllers\Finanzas\CajaController::class);
    Route::apiResource('ingresos-egresos', \App\Http\Controllers\Finanzas\IngresoEgresoController::class);
    Route::apiResource('plan-cuentas', \App\Http\Controllers\Finanzas\PlanCuentasController::class);
    Route::apiResource('proveedores', \App\Http\Controllers\Finanzas\ProveedoresController::class);
    Route::apiResource('bancos', \App\Http\Controllers\Finanzas\BancoController::class);

    /*
    |--------------------------------------------------------------------------
    | ⚙️ Parámetros
    |--------------------------------------------------------------------------
    */
    Route::apiResource('afps', \App\Http\Controllers\Parametros\AFPController::class);
    Route::apiResource('parametros-generales', \App\Http\Controllers\Parametros\ParametrosGeneralesController::class);
    Route::apiResource('parametros-contables', \App\Http\Controllers\Parametros\ParametrosContablesController::class);
    Route::apiResource('tipos-medidor', \App\Http\Controllers\Parametros\TipoMedidorController::class);
    Route::apiResource('tipo-clientes', \App\Http\Controllers\Parametros\TipoClienteController::class);

    /*
    |--------------------------------------------------------------------------
    | 📢 Comunicaciones
    |--------------------------------------------------------------------------
    */
    Route::apiResource('comunicados', \App\Http\Controllers\Comunicaciones\ComunicadoController::class);
    Route::apiResource('notificaciones', \App\Http\Controllers\Comunicaciones\NotificacionController::class);

    /*
    |--------------------------------------------------------------------------
    | 📩 Reclamos
    |--------------------------------------------------------------------------
    */
    Route::apiResource('reclamos', \App\Http\Controllers\Reclamos\ReclamoController::class);
    Route::apiResource('tipos-reclamos', \App\Http\Controllers\Reclamos\TipoReclamoController::class);

    /*
    |--------------------------------------------------------------------------
    | 🧾 Documentos y registros
    |--------------------------------------------------------------------------
    */
    Route::apiResource('liquidaciones', \App\Http\Controllers\Documentos\LiquidacionController::class);
    Route::apiResource('dte', \App\Http\Controllers\Finanzas\DTEController::class);
    Route::apiResource('tickets', \App\Http\Controllers\Documentos\TicketController::class);
    Route::apiResource('actas', \App\Http\Controllers\Documentos\ActaController::class);

    /*
    |--------------------------------------------------------------------------
    | 📦 Inventario
    |--------------------------------------------------------------------------
    */
    Route::apiResource('inventario', \App\Http\Controllers\Inventario\InventarioController::class);
    Route::apiResource('items', \App\Http\Controllers\Inventario\ItemsController::class);

    /*
    |--------------------------------------------------------------------------
    | 🛠️ Utilidades y sistema
    |--------------------------------------------------------------------------
    */
    Route::apiResource('bitacora', \App\Http\Controllers\Sistema\BitacoraController::class);
    Route::apiResource('logs', \App\Http\Controllers\Sistema\LogController::class);
    Route::apiResource('modulos', \App\Http\Controllers\Sistema\ModuloController::class);
    Route::apiResource('modulo-acceso', \App\Http\Controllers\Sistema\ModuloAccesoController::class);
    Route::apiResource('calendario', \App\Http\Controllers\Sistema\CalendarioController::class);
    Route::apiResource('estadisticas', \App\Http\Controllers\Sistema\EstadisticasController::class);

});
