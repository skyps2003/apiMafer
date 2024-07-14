<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $customerTypes = CustomerType::all();
            return response()->json($customerTypes);
        } catch (Exception $e) {
            Log::error('Error al obtener los tipos: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los tipos'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerType $customerType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerType $customerType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerType $customerType)
    {
            try {
                $customerType->delete();
                return response()->json([
                    'message' => 'Tipo de cliente eliminado con éxito'
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Error al eliminar el tipo de cliente',
                    'error' => $e->getMessage()
                ], 500);
            }
    }
}
