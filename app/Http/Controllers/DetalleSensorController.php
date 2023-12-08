<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleSensor;

class DetalleSensorController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'vitrina_id' => 'required|exists:vitrinas,id',
            'sensor_id' => 'required|exists:sensores,id',
            'valor_sensor' => 'required|numeric',
            'fecha_hora' => 'required|date',
        ]);

        $detalleSensor = DetalleSensor::create([
            'vitrina_id' => $request->input('vitrina_id'),
            'sensor_id' => $request->input('sensor_id'),
            'valor_sensor' => $request->input('valor_sensor'),
            'fecha_hora' => $request->input('fecha_hora'),
        ]);

        return response()->json(['message' => 'Detalle de sensor creado exitosamente'], 201);
    }

    public function update(Request $request, $vitrinaId, $sensorId)
    {
        // Valida los datos
        $request->validate([
            'valor_sensor' => 'required|numeric',
            'fecha_hora' => 'required|date',
        ]);

        $detalleSensor = DetalleSensor::where('vitrina_id', $vitrinaId)
            ->where('sensor_id', $sensorId)
            ->firstOrFail();

        $detalleSensor->update([
            'valor_sensor' => $request->input('valor_sensor'),
            'fecha_hora' => $request->input('fecha_hora'),
        ]);

        return response()->json(['message' => 'Detalle de sensor actualizado exitosamente']);
    }
}
