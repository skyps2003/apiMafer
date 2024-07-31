<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends BaseController
{ 
    protected $defaultImagePath = 'http://127.0.0.1:8000/storage/images/logo_perfil.jpeg'; 

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        try {
            $products = Product::all();
            return $this->sendResponse($products, 'Lista de productos');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function store(StoreRequest $request)
{
    try {
        $validated = $request->validated();

        if (empty($validated['img'])) {
            $validated['img'] = $this->defaultImagePath;
        }

        $validated['created_by'] = Auth::id();
        $validated['updated_by'] = Auth::id();

        $product = Product::create($validated);
        return $this->sendResponse($product, 'Producto agregado exitosamente', 'success', 201);
    } catch (Exception $e) {
        return $this->sendError($e->getMessage());
    }
}

    public function show(Product $product)
    {
        try {
            return $this->sendResponse($product, 'Producto encontrado exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function update(UpdateRequest $request, Product $product)
{
    try {
        $validated = $request->validated();

        if (empty($validated['img'])) {
            $validated['img'] = $this->defaultImagePath;
        }

        $validated['updated_by'] = Auth::id();

        $product->update($validated);

        return $this->sendResponse($product, 'Producto actualizado exitosamente');
    } catch (Exception $e) {
        return $this->sendError($e->getMessage());
    }
}

    public function destroy(Product $product)
    {
        try {
            if ($product->img && $product->img !== $this->defaultImagePath) {
                Storage::delete('public/' . $product->img);
            }
            $product->delete();
            return $this->sendResponse([], 'Producto eliminado exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
    public function amount()
    {
        try{
            $amount = Product::count();
            return response()->json($amount);
        }catch(Exception $e)
        {
            return $this->sendError($e->getMessage());
        }
    }
}
