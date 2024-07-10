<?php
namespace App\Http\Controllers;

use App\Http\Requests\Inventory\StoreRequest;
use App\Http\Requests\Inventory\UpdateRequest;
use App\Models\Inventory;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

class InventoryController extends Controller
{
    public function index()
    {
        try {
            $inventories = Inventory::with('detailedProduct', 'detailedProduct.product', 'detailedProduct.provider', 'detailedProduct.category')->get();
            return response()->json($inventories);
        } catch (Exception $e) {
            Log::error('Error al obtener los inventarios: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error al obtener los inventarios', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $expirationDate = now()->addMonths(6);
            $validated['expiration_date'] = $expirationDate;
            $inventory = Inventory::create($validated);
            return response()->json(['message' => 'Inventario creado con éxito', 'inventory' => $inventory], 201);
        } catch (ValidationException $e) {
            Log::error('Error de validación al crear el inventario: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            Log::error('Error al crear el inventario: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error al crear el inventario', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Inventory $inventory)
    {
        try {
            $inventory->load('product');
            return response()->json($inventory);
        } catch (ModelNotFoundException $e) {
            Log::error('Inventario no encontrado: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Inventario no encontrado', 'error' => $e->getMessage()], 404);
        } catch (Exception $e) {
            Log::error('Error al obtener el inventario: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error al obtener el inventario', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateRequest $request, Inventory $inventory)
    {
        try {
            $validated = $request->validated();
            $inventory->update($validated);
            return response()->json(['message' => 'Inventario actualizado con éxito', 'inventory' => $inventory]);
        } catch (ValidationException $e) {
            Log::error('Error de validación al actualizar el inventario: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            Log::error('Error al actualizar el inventario: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error al actualizar el inventario', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Inventory $inventory)
    {
        try {
            $inventory->delete();
            return response()->json(['message' => 'Inventario eliminado con éxito']);
        } catch (Exception $e) {
            Log::error('Error al eliminar el inventario: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Error al eliminar el inventario', 'error' => $e->getMessage()], 500);
        }
    }
}
