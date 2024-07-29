<?php
namespace App\Http\Controllers;

use App\Http\Requests\Inventory\StoreRequest;
use App\Http\Requests\Inventory\UpdateRequest;
use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Auth;

class InventoryController extends BaseController
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    public function index()
    {
        try {
            $inventories = Inventory::with('detailedProduct', 'detailedProduct.product', 'detailedProduct.provider', 'detailedProduct.category')->get();
            return $this->sendResponse($inventories, 'Lista de inventarios');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['location'] = 'En el almacen';
            $validated['expiration_date'] = Carbon::now()->addMonths(6)->toDateString();
            $validated['created_by'] = Auth::id();
            $validated['updated_by'] = Auth::id();
            $inventory = Inventory::create($validated);
            return $this->sendResponse($inventory, 'Inventario creado exitosamente.', 'success', 201);
        }catch (Exception $e) {
           return $this->sendError($e->getMessage());
        }
    }

    public function show(Inventory $inventory)
    {
        try {
            $inventory->load('detailedProduct');
            return $this->sendResponse($inventory, 'Inventario encontrado exitosamente');
        }catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function update(UpdateRequest $request, Inventory $inventory)
    {
        try {
            $validated = $request->validated();
            $validated['updated_by'] = Auth::id();
            $inventory->update($validated);
            return $this->sendResponse($inventory, 'Inventario actualizado exitosamente');
        }catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function destroy(Inventory $inventory)
    {
        try {
            $inventory->delete();
            return $this->sendResponse([], 'Invetario eliminado exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
