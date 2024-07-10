<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products);
        } catch (Exception $e) {
            Log::error('Error al obtener los productos: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los productos'], 500);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $path = $image->store('public/products');
                $validated['img'] = Storage::url($path);
            }

            $product = Product::create($validated);
            return response()->json(['message' => 'Producto creado con éxito', 'product' => $product], 201);
        } catch (Exception $e) {
            Log::error('Error al crear el producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al crear el producto', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Product $product)
    {
        try {
            $product->load('productType', 'category', 'provider');
            return response()->json($product);
        } catch (Exception $e) {
            Log::error('Error al obtener el producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener el producto', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateRequest $request, Product $product)
    {
        try {
            $validated = $request->validated();

            // Manejo de imagen si se proporciona
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $path = $image->store('public/products');
                $validated['img'] = Storage::url($path);
            }

            $product->update($validated);
            return response()->json(['message' => 'Producto actualizado con éxito', 'product' => $product]);
        } catch (Exception $e) {
            Log::error('Error al actualizar el producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al actualizar el producto', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json(['message' => 'Producto eliminado con éxito']);
        } catch (Exception $e) {
            Log::error('Error al eliminar el producto: ' . $e->getMessage());
            return response()->json(['message' => 'Error al eliminar el producto', 'error' => $e->getMessage()], 500);
        }
    }
}
