<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailedProduct\StoreRequest;
use App\Http\Requests\DetailedProduct\UpdateRequest;
use App\Models\DetailedProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DetailedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $detailedProducts = DetailedProduct::with('product', 'provider', 'category')->get();
            return response()->json($detailedProducts);
        } catch (Exception $e) {
            Log::error('Error al obtener los detalle productos: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los detalle productos'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $detailedProduct = DetailedProduct::create($validated);
            return response()->json(['message' => 'Detalle producto creado con éxito', 'detailedProduct' => $detailedProduct], 201);
        } catch (Exception $e) {
            Log::error('Error al crear el detalle producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al crear el detalle producto'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailedProduct $detailedProduct)
    {
        try {
            $detailedProduct->load('product', 'provider', 'category');
            return response()->json($detailedProduct);
        } catch (Exception $e) {
            Log::error('Error al obtener el detalle producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener el detalle producto', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, DetailedProduct $detailedProduct)
    {
        try {
            $validated = $request->validated();
            $detailedProduct->update($validated);
            return response()->json(['message' => 'Detalle producto actualizado con éxito', 'detailedProduct' => $detailedProduct]);
        } catch (Exception $e) {
            Log::error('Error al actualizar el Detalle producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al actualizar el Detalle producto', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailedProduct $detailedProduct)
    {
        try {
            $detailedProduct->delete();
            return response()->json(['message' => 'Detalle producto eliminado con éxito']);
        } catch (Exception $e) {
            Log::error('Error al eliminar el detalle producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al eliminar el detalle producto', 'error' => $e->getMessage()], 500);
        }
    }
}
