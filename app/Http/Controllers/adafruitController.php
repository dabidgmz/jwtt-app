<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class adafruitController extends Controller
{
    public function humedad()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/humedad/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json(); // Obtener el JSON de la respuesta

        // Extraer los valores necesarios
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}
public function temperatura()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/temperatura/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json();
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}
public function gas()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/gas/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json();
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}
public function ultrasonico()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/ultrasonico/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json();
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}
public function impacto()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/impacto/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json();
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}
public function luz()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/luz/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json();
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}

public function vibracion()
{
    $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_QUAu36PYGEgDrnkNnEimpVbutJDz'
    ])->get('https://io.adafruit.com/api/v2/1029384756/feeds/vibracion/data?limit=1');

    if ($response->successful()) {
        $responseData = $response->json();
        $dataToShow = [
            'value' => $responseData[0]['value'],
            'feed_id' => $responseData[0]['feed_id'],
            'feed_key' => $responseData[0]['feed_key'],
        ];

        return response()->json([
            "message" => 'Datos obtenidos correctamente',
            "data" => $dataToShow
        ], 200);
    } else {
        return response()->json(
            [
                'message' => 'Error al obtener los datos',
                'data' => $response->body()
            ],
            $response->status()
        );
    }   
}


    }