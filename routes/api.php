<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Usuarios\UserController;
use App\Http\Controllers\Usuarios\RoleController;
use App\Http\Controllers\Usuarios\CategoriaUsuarioController;
use App\Http\Controllers\Usuarios\UsuarioSuspendidoController;
use App\Http\Controllers\Usuarios\UsuarioAdminDatoController;
use App\Http\Controllers\Usuarios\RutaController;
use App\Http\Controllers\Usuarios\UsuarioClienteDatoController;
use App\Http\Controllers\Usuarios\ReceptoresController;
use App\Http\Controllers\Usuarios\ComunaController;

use App\Http\Controllers\Agua\RegistroConsumoController;
use App\Http\Controllers\Agua\TarifaController;
use App\Http\Controllers\Agua\OtrasTarifaController;
use App\Http\Controllers\Agua\PagoController;
use App\Http\Controllers\Agua\PagoDteDatoController;
use App\Http\Controllers\Agua\MedidorController;


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
    // Usuarios
    Route::put('/usuarios/{id}/restaurar', [UserController::class, 'restaurar'])->name('usuarios.restaurar');
    Route::get('/usuarios-eliminados', [UserController::class, 'eliminados'])->name('usuarios.eliminados');
    Route::put('/usuarios/cambiar-password', [UserController::class, 'cambiarPassword'])->name('usuarios.cambiarPassword');
    Route::apiResource('usuarios', UserController::class);

    // Usuarios Admin Datos
    Route::get('usuarios-admin-datos-eliminados', [UsuarioAdminDatoController::class, 'eliminados'])->name('usuarios-admin-datos.eliminados');
    Route::put('usuarios-admin-datos-restaurar/{id}', [UsuarioAdminDatoController::class, 'restore'])->name('usuarios-admin-datos.restaurar');
    Route::get('/usuarios-admin-datos/operadores', [UsuarioAdminDatoController::class, 'operadores']);
    Route::apiResource('usuarios-admin-datos', UsuarioAdminDatoController::class);
    Route::apiResource('usuario-cliente-datos', UsuarioClienteDatoController::class);

    // Roles
    Route::put('/roles/{id}/restaurar', [RoleController::class, 'restaurar'])->name('roles.restaurar');
    Route::get('/roles-eliminados', [RoleController::class, 'eliminados'])->name('roles.eliminados');
    Route::apiResource('roles', RoleController::class);

    // Categorías de Usuario
    Route::put('categorias-usuarios/{id}/restaurar', [CategoriaUsuarioController::class, 'restore'])->name('categorias-usuarios.restaurar');
    Route::get('categorias-usuarios-eliminados', [CategoriaUsuarioController::class, 'eliminados'])->name('categorias-usuarios.eliminados');
    Route::apiResource('categorias-usuarios', CategoriaUsuarioController::class);

    // Usuarios Suspendidos
    Route::put('usuarios-suspendidos-restaurar/{id}', [UsuarioSuspendidoController::class, 'restore'])->name('usuarios-suspendidos.restaurar');
    Route::get('usuarios-suspendidos-eliminados', [UsuarioSuspendidoController::class, 'eliminados'])->name('usuarios-suspendidos.eliminados');
    Route::apiResource('usuarios-suspendidos', UsuarioSuspendidoController::class);

    // Rutas
    Route::get('rutas-eliminadas', [RutaController::class, 'eliminados'])->name('rutas.eliminados');
    Route::put('rutas-restaurar/{id}', [RutaController::class, 'restore'])->name('rutas.restaurar');
    Route::apiResource('rutas', RutaController::class);

    //Receptores
    Route::apiResource('receptores', ReceptoresController::class);

    // Comunas
    Route::get('comunas-eliminadas', [ComunaController::class, 'eliminados'])->name('comunas.eliminados');
    Route::put('comunas-restaurar/{id}', [ComunaController::class, 'restaurar'])->name('comunas.restaurar');
    Route::apiResource('comunas', ComunaController::class);

    /*
    |--------------------------------------------------------------------------
    | 💧 Agua y Consumo
    |--------------------------------------------------------------------------
    */

    Route::get('/registro-consumo/usuario/{usuario_id}/medidor/{medidor_id}', [RegistroConsumoController::class, 'lecturasPorUsuarioYMedidor']);
    Route::apiResource('registro-consumo', RegistroConsumoController::class);

    Route::post('/pagos/generar', [PagoController::class, 'generarDesdeConsumo']);
    Route::apiResource('pagos', PagoController::class);
    Route::apiResource('pagos-dte-datos', PagoDteDatoController::class);

    Route::get('/tarifas/agrupadas', [TarifaController::class, 'agrupadas']);
    Route::apiResource('tarifas', TarifaController::class);

    Route::apiResource('otras-tarifas', OtrasTarifaController::class);
    
    Route::apiResource('medidores', MedidorController::class);


    Route::apiResource('produccion-agua', \App\Http\Controllers\Agua\ProduccionAguaController::class);
    Route::apiResource('repactaciones', \App\Http\Controllers\Agua\RepactacionController::class);
    Route::apiResource('convenios', \App\Http\Controllers\Agua\ConvenioController::class);
    Route::apiResource('subsidios', \App\Http\Controllers\Agua\SubsidioController::class);

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
