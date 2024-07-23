<?php

namespace App\Http\Controllers;

use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;
use App\Models\Provider;
use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class ProviderController extends BaseController
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.apis.net.pe',
            'verify' => false,
        ]);
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $providers = Provider::all();
            return $this->sendResponse($providers, 'Lista de proveedores');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $provider = Provider::create([
                'ruc' => $request->ruc,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'reason' => $request->reason,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ]);
            return $this->sendResponse($provider, 'Proveedor creado exitosamente', 'success', 201);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        try {
            return $this->sendResponse($provider, 'Proveedor encontrado');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Provider $provider)
    {
        try {
            $provider->update([
                'ruc' => $request->ruc ?? $provider->ruc,
                'name' => $request->name ?? $provider->name,
                'phone' => $request->phone ?? $provider->phone,
                'email' => $request->email ?? $provider->email,
                'address' => $request->address ?? $provider->address,
                'reason' => $request->reason ?? $provider->reason,
                'updated_by' => Auth::id()
            ]);
            return $this->sendResponse($provider, 'Proveedor actualizado correctamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        try {
            $provider->delete();
            return $this->sendResponse([], 'Proveedor eliminado exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
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
            return response()->json([
                'error' => 'RequestException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        } catch (ConnectException $e) {
            return response()->json([
                'error' => 'ConnectException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'GeneralException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }
}
