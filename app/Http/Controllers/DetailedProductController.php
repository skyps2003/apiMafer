<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailedProduct\StoreRequest;
use App\Http\Requests\DetailedProduct\UpdateRequest;
use App\Models\DetailedProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DetailedProductController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $detailedProducts = DetailedProduct::with('product', 'provider', 'category')->get();
            return $this->sendResponse($detailedProducts, 'Lista de detalle producto');
        } catch (Exception $e) {
            Log::error('Error al obtener los detalle productos: ' . $e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['created_by'] = Auth::id();
            $validated['updated_by'] = Auth::id();
            $detailedProduct = DetailedProduct::create($validated);
            return $this->sendResponse($detailedProduct, 'Detalle producto creado exitosamente', 'success', 201);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailedProduct $detailedProduct)
    {
        try {
            $detailedProduct->load('product', 'provider', 'category');
            return $this->sendResponse($detailedProduct, 'Detalle producto encontrado exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, DetailedProduct $detailedProduct)
    {
        try {
            $validated = $request->validated();
            Log::info('Datos validados para actualización:', $validated);
            $validated['updated_by'] = Auth::id();
            $detailedProduct->update($validated);
            return $this->sendResponse($detailedProduct, 'Detalle producto actualizado correctamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailedProduct $detailedProduct)
    {
        try {
            $detailedProduct->delete();
            return $this->sendResponse([], 'Detalle producto eliminado correctamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
    public function amount()
    {
        try{
            $amount = DetailedProduct::count();
            return response()->json($amount);
        }catch(Exception $e)
        {
            return $this->sendError($e->getMessage());
        }
    }
}
