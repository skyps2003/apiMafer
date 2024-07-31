<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::with('customerType')->get();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $customer = Customer::create($request->validated());
            return response()->json([
                'message' => 'Cliente creado con éxito',
                'data' => $customer
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Customer $customer)
    {
        try {
            $customer->update($request->validated());
            return response()->json([
                'message' => 'Cliente actualizado con éxito',
                'data' => $customer
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return response()->json([
                'message' => 'Cliente eliminado con éxito'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function amount()
    {
        try{
            $amount = Customer::count();
            return response()->json($amount);
        }catch(Exception $e)
        {
            return $this->sendError($e->getMessage());
        }
    }
}
