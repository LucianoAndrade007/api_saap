<?php

namespace App\Services;

use App\Models\Agua\Pago;
use Carbon\Carbon;

class PagoService
{
    public function generarPagoDesdeConsumo(array $dataConsumo, array $datosTarifas, array $datosOtrasTarifas): Pago
    {
        $m3 = $dataConsumo['medicion_actual'] - $dataConsumo['medicion_anterior'];

        $valorM3Agua = $datosTarifas['m3_agua'];
        $valorM3Alcantarillado = $datosTarifas['m3_alcan'];
        $valorFijoAgua = $datosTarifas['c_f_agua'];
        $valorFijoAlcantarillado = $datosTarifas['c_f_alcan'];

        $valor_mensual_agua = $valorM3Agua * $m3;
        $valor_mensual_alcantarillado = $valorM3Alcantarillado * $m3;

        $total_consumo_agua_alcantarillado = ($valor_mensual_agua + $valor_mensual_alcantarillado);
        $total_fijo_agua_alcantarillado = $valorFijoAgua + $valorFijoAlcantarillado;

        $subtotal = $total_consumo_agua_alcantarillado + $total_fijo_agua_alcantarillado;

        // Descuento APR Inicio //
        $fijos_descuento_apr_con = collect($datosOtrasTarifas)->firstWhere('codigo', 'fijos_descuento_apr_con')['valor'];
        $porcentaje_descuento_apr_con = collect($datosOtrasTarifas)->firstWhere('codigo', 'porcentaje_descuento_apr_con')['valor'];
        $mcs_descuento_apr_con = collect($datosOtrasTarifas)->firstWhere('codigo', 'mcs_descuento_apr_con')['valor'];
        $descuentoAPR = 0;
        if($dataConsumo['subsidio_apr'] == 1 && $fijos_descuento_apr_con == 1){
            $descuentoAgua = min($m3, $mcs_descuento_apr_con) * $valorM3Agua;
            $descuentoAlcantarillado = min($m3, $mcs_descuento_apr_con) * $valorM3Alcantarillado;
            $descuentoAPR = round((($descuentoAgua + $descuentoAlcantarillado) * $porcentaje_descuento_apr_con) /100) + $total_fijo_agua_alcantarillado;
        }else if ($dataConsumo['subsidio_apr'] == 1) {
            $descuentoAgua = min($m3, $mcs_descuento_apr_con) * $valorM3Agua;
            $descuentoAlcantarillado = min($m3, $mcs_descuento_apr_con) * $valorM3Alcantarillado;
            $descuentoAPR = round((($descuentoAgua + $descuentoAlcantarillado) * $porcentaje_descuento_apr_con) /100);
        }
        // Descuento APR FIN //

        // Descuento Municipal Inicio //
        $descuentoMunicipal = 0;
        if($dataConsumo['subsidio_municipal'] == 1 && $dataConsumo['fijos_desc_municipal']  == 1){
            $descuentoAgua = min($m3, $dataConsumo['mcs_desc_municipal']) * $valorM3Agua;
            $descuentoAlcantarillado = min($m3, $dataConsumo['mcs_desc_municipal']) * $valorM3Alcantarillado;
            $descuentoMunicipal = round((($descuentoAgua + $descuentoAlcantarillado) * $dataConsumo['porcentaje_desc_municipal']) /100) + $total_fijo_agua_alcantarillado;
        }else if ($dataConsumo['subsidio_municipal'] == 1) {
            $descuentoAgua = min($m3, $dataConsumo['mcs_desc_municipal']) * $valorM3Agua;
            $descuentoAlcantarillado = min($m3, $dataConsumo['mcs_desc_municipal']) * $valorM3Alcantarillado;
            $descuentoMunicipal = round((($descuentoAgua + $descuentoAlcantarillado) * $dataConsumo['porcentaje_desc_municipal']) /100);
        }
        // Descuento Municipal Inicio //

        //Sobreconsumo Inicio //
        $limite_metros_cubicos_consumidos = collect($datosOtrasTarifas)->firstWhere('codigo', 'limite_metros_cubicos_consumidos')['valor'] ?? null;
        $porcentaje_m3_sobreconsumo = collect($datosOtrasTarifas)->firstWhere('codigo', 'porcentaje_m3_sobreconsumo')['valor'] ?? null;
        $m3_Sobreconsumo = 0;
        $total_sobreconsumo = 0;
        $porcentaje_sobreconsumo = 0;
        $m3LimiteSobreconsumo = 0;

        if($m3 > $limite_metros_cubicos_consumidos){
            $porcentaje_sobreconsumo = $porcentaje_m3_sobreconsumo;
            $m3LimiteSobreconsumo = $limite_metros_cubicos_consumidos;
            $m3_Sobreconsumo = $m3 - $m3LimiteSobreconsumo;
            $valorSobreconsumo = ($valorM3Agua * $m3_Sobreconsumo) + ($valorM3Alcantarillado * $m3_Sobreconsumo);
            $total_sobreconsumo = (($total_sobreconsumo * $porcentaje_sobreconsumo) /100) + $valorSobreconsumo;
        }
        $subtotal = $subtotal + $total_sobreconsumo;
        //Sobreconsumo Fin //

        // Calculo cargos Inicio//
        $cargo_reposicion = 0;
        $cargo_intervencion = 0;

        if($dataConsumo['costo_reposicion_servicio'] == 1 ){
            $cargo_reposicion = collect($datosOtrasTarifas)->firstWhere('codigo', 'costo_reposicion_servicio')['valor'];
        } 
        if($dataConsumo['multa_intervencion_servicio'] == 1){
            $cargo_intervencion = collect($datosOtrasTarifas)->firstWhere('codigo', 'multa_intervencion_servicio')['valor'];
        }
        
        // Calculo cargos Fin//



        $totalConDescuentos = max(0, $subtotal - $descuentoAPR - $descuentoMunicipal + $cargo_reposicion  + $cargo_intervencion  );
        $valorIVA = collect($datosOtrasTarifas)->firstWhere('codigo', 'impuesto_iva')['valor'] ?? null;
        $iva = round(($totalConDescuentos * $valorIVA)/100); 
        $montoTotal = $totalConDescuentos + $iva;

        


            \Log::error('TarifasObtenidas.', [
                'm3' => $m3,
                'valorM3Agua' => $valorM3Agua,
                'valorM3Alcantarillado' => $valorM3Alcantarillado,
                'valorFijoAgua' => $valorFijoAgua,
                'valorFijoAlcantarillado' => $valorFijoAlcantarillado,
                'valor_mensual_agua' => $valor_mensual_agua,
                'valor_mensual_alcantarillado' => $valor_mensual_alcantarillado,
                'total_consumo_agua_alcantarillado' => $total_consumo_agua_alcantarillado,
                'total_fijo_agua_alcantarillado' => $total_fijo_agua_alcantarillado,
                'subtotal' => $subtotal,
                'm3_Sobreconsumo' => $m3_Sobreconsumo,
                'descuentoAPR' => $descuentoAPR
            ]);
        

        \Log::info('/generarPagoDesdeConsumo/dataConsumo:', $dataConsumo);
        \Log::info('/generarPagoDesdeConsumo/datosTarifas:', $datosTarifas);
        \Log::info('/generarPagoDesdeConsumo/datosOtrasTarifas:', $datosOtrasTarifas);


        return Pago::create([
            'consumo_id' => $dataConsumo['id'],
            'usuario_id' => $dataConsumo['usuario_id'],
            'tipo_usuario_id' => $dataConsumo['tipo_usuario_id'],
            'tipo_medidor_id' => $dataConsumo['tipo_medidor_id'],
            'fecha_lectura_anterior' => $dataConsumo['fecha_lectura_anterior'],
            'fecha_lectura_actual' => $dataConsumo['fecha_lectura_actual'],
            'medicion_anterior' => $dataConsumo['medicion_anterior'],
            'medicion_actual' => $dataConsumo['medicion_actual'],
            'm3_consumidos' => $m3,
            'valor_m3_agua' => $valorM3Agua,
            'valor_m3_alcantarillado' => $valorM3Alcantarillado,
            'valor_fijo_agua' => $valorFijoAgua,
            'valor_fijo_alcantarillado' => $valorFijoAlcantarillado,
            'valor_mensual_agua' => $valor_mensual_agua,
            'valor_mensual_alcantarillado' => $valor_mensual_alcantarillado,
            'total_consumo_agua_alcantarillado' => $total_consumo_agua_alcantarillado,
            'total_fijo_agua_alcantarillado' => $total_fijo_agua_alcantarillado,
            'total_sin_descuento' => $subtotal,
            'descuento_subsidio' => $descuentoMunicipal,
            'descuento_convenio_apr' => $descuentoAPR,
            'costo_reposicion_servicio' => $cargo_reposicion,
            'multa_intervencion_servicio' => $cargo_intervencion,
            'iva' => $iva,
            'monto_total' => $montoTotal,
            'pago_habilitado' => 1, // *revisar
            'estado_id' => 1, // Por defecto: pendiente
            'limite_m3_consumo' => $m3LimiteSobreconsumo,
            'm3_sobreconsumo' => $m3_Sobreconsumo,
            'total_sobreconsumo' => $total_sobreconsumo,
            'porcentaje_sobreconsumo' => $porcentaje_sobreconsumo,
            'fecha_pago' => null,
            'origen' => $dataConsumo['origen']
        ]);
    }
}
