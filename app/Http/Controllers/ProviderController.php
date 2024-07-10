<?php

namespace App\Http\Controllers;

use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;
use App\Models\Provider;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class ProviderController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.apis.net.pe',
            'verify' => false,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $providers = Provider::all();
            return response()->json($providers);
        } catch (Exception $e) {
            Log::error('Error al obtener los proveedores: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los proveedores']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $provider = Provider::create($request->validated());
            return response()->json(['message' => 'Proveedor creado con éxito', 'provider' => $provider]);
        } catch (Exception $e) {
            Log::error('Error al crear el proveedor: ' . $e->getMessage());
            return response()->json(['message' => 'Error al crear el proveedor']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        try {
            return response()->json($provider);
        } catch (Exception $e) {
            Log::error('Error al obtener el proveedor: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener el proveedor']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Provider $provider)
    {
        try {
            $provider->update($request->validated());
            return response()->json(['message' => 'Proveedor actualizado con éxito', 'provider' => $provider]);
        } catch (Exception $e) {
            Log::error('Error al actualizar el proveedor: ' . $e->getMessage());
            return response()->json(['message' => 'Error al actualizar el proveedor']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        try {
            $provider->delete();
            return response()->json(['message' => 'Proveedor eliminado con éxito']);
        } catch (Exception $e) {
            Log::error('Error al eliminar el proveedor: ' . $e->getMessage());
            return response()->json(['message' => 'Error al eliminar el proveedor']);
        }
    }
    public function consultarRuc($rucNumber)
    {
        $token = 'apis-token-9267.Cg5Z55wy2ggaaC9lqFdJnyheToq5KpEZ';
    
        try {
            $res = $this->client->request('GET', '/v2/sunat/ruc', [
                'http_errors' => false,
                'connect_timeout' => 5,
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Referer' => 'https://apis.net.pe/api-consulta-ruc',
                    'User-Agent' => 'laravel/guzzle',
                    'Accept' => 'application/json',
                ],
                'query' => ['numero' => $rucNumber],
            ]);
    
            if ($res->getStatusCode() == 200) {
                $response = json_decode($res->getBody()->getContents(), true);
                return response()->json($response);
            } else {
                $errorBody = json_decode($res->getBody()->getContents(), true);
                return response()->json([
                    'error' => 'Error al consultar el RUC',
                    'status' => $res->getStatusCode(),
                    'details' => $errorBody
                ], $res->getStatusCode());
            }
        } catch (RequestException $e) {
            Log::error('RequestException: ' . $e->getMessage());
            return response()->json([
                'error' => 'RequestException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        } catch (ConnectException $e) {
            Log::error('ConnectException: ' . $e->getMessage());
            return response()->json([
                'error' => 'ConnectException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        } catch (Exception $e) {
            Log::error('GeneralException: ' . $e->getMessage());
            return response()->json([
                'error' => 'GeneralException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }
}
