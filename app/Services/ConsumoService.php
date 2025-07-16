<?php

namespace App\Services;

use App\Models\Agua\RegistroConsumo;
use App\Models\Agua\Tarifa;
use App\Models\Agua\OtrasTarifa;
use App\Models\Agua\Medidor;
use App\Models\UsuarioClienteDato;
use App\Services\PagoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class ConsumoService
{
    protected $pagoService;

    public function __construct(PagoService $pagoService)
    {
        $this->pagoService = $pagoService;
    }

    public function registrarConsumo(array $data): bool
    {
        DB::beginTransaction();
        \Log::info('Datos recibidos para RegistroConsumo:', $data);
        try {

            $ultimaLectura = $this->obtenerUltimaLectura($data['usuario_id'], $data['medidor_id']);

            $consumo = RegistroConsumo::create($data);

            $datosTarifas = $this->obtenerTarifasActuales($data['usuario_id'], $data['medidor_id']);
            $datosOtrasTarifas = $this->obtenerOtrasTarifas();
            $subsidioMunicipalUsuario = $this->obtenerSubsidioMunicipalUsuario($data['usuario_id']);
            
            $medicionAnterior = $ultimaLectura?->consumo ?? 0;
            $fechaAnterior = $ultimaLectura?->fecha_lectura ?? Carbon::parse($consumo->fecha_lectura)->subMonth();
            
            if (!$datosTarifas) {
                \Log::error('No se encontraron tarifas activas.', [
                    'usuario_id' => $data['usuario_id'],
                    'medidor_id' => $data['medidor_id']
                ]);
                throw new \Exception('No se encontraron tarifas activas para el usuario o medidor.');
            }
    
            \Log::info('Tarifas encontradas:', ['tarifas' => $datosTarifas]);
    
            $this->pagoService->generarPagoDesdeConsumo([
                'id' => $consumo->id,
                'usuario_id' => $consumo->usuario_id,
                'tipo_usuario_id' => $this->obtenerTipoUsuario($consumo->usuario_id),
                'tipo_medidor_id' => $this->obtenerTipoMedidor($consumo->medidor_id),
                'subsidio_apr' => $this->obtenerSubsidioAprUsuario($consumo->usuario_id),
                'fecha_lectura_anterior' => $fechaAnterior,
                'fecha_lectura_actual' => $consumo->fecha_lectura,
                'costo_reposicion_servicio' => $consumo->costo_reposicion_servicio,
                'multa_intervencion_servicio' => $consumo->multa_intervencion_servicio,
                'medicion_anterior' => $medicionAnterior ,
                'medicion_actual' => $data['consumo'],
                'subsidio_municipal' => $subsidioMunicipalUsuario['subsidio_municipal'],
                'porcentaje_desc_municipal' => $subsidioMunicipalUsuario['porcentaje_desc_municipal'],
                'mcs_desc_municipal' => $subsidioMunicipalUsuario['mcs_desc_municipal'],
                'fijos_desc_municipal' => $subsidioMunicipalUsuario['fijos_desc_municipal'],
                'origen' => $data['origen'],
            ], $datosTarifas, $datosOtrasTarifas);
    
            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error('Error al registrar consumo:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }
    
    private function obtenerTarifasActuales($usuarioId, $medidorId): ?array
    {
        $categoriaUsuarioId = $this->obtenerTipoUsuario($usuarioId);
        $tipoMedidorId = $this->obtenerTipoMedidor($medidorId);
    
        $tarifaBase = Tarifa::where('categorias_usuarios_id', $categoriaUsuarioId)
            ->where('tipos_medidor_id', $tipoMedidorId)
            ->latest()
            ->first();
    
        return $tarifaBase?->toArray(); // <-- aquí el cambio
    }      

    private function obtenerOtrasTarifas()
    {
        $otrasTarifas = OtrasTarifa::all()->toArray();
        return $otrasTarifas;
    }

    private function obtenerTipoUsuario(int $usuarioId): int
    {
        return UsuarioClienteDato::findOrFail($usuarioId)->tipo_cliente_id;
    }

    private function obtenerSubsidioAprUsuario(int $usuarioId): int
    {
        return UsuarioClienteDato::findOrFail($usuarioId)->subsidio_apr;
    }

    private function obtenerTipoMedidor(int $medidorId): int
    {
        return Medidor::findOrFail($medidorId)->tipo_medidor_id;
    }
    
    private function obtenerUltimaLectura(int $usuarioId, int $medidorId)
    {
        $ultimoConsumo =  RegistroConsumo::where('usuario_id', $usuarioId)
            ->where('medidor_id', $medidorId)
            ->orderByDesc('fecha_lectura')
            ->first();

            \Log::info('/obtenerUltimaLectura: consumo anterior encontrado', $ultimoConsumo?->toArray() ?? []);

            return $ultimoConsumo;
    }

    private function obtenerSubsidioMunicipalUsuario(int $usuarioId): array
    {
        $usuario = UsuarioClienteDato::findOrFail($usuarioId);

        return [
            'subsidio_municipal' => $usuario->subsidio_municipal,
            'porcentaje_desc_municipal' => $usuario->porcentaje_desc_municipal,
            'mcs_desc_municipal' => $usuario->mcs_desc_municipal,
            'fijos_desc_municipal' => $usuario->fijos_desc_municipal,
        ];
    }


}
