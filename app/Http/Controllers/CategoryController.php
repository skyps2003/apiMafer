<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            return response()->json($categories);
        } catch (Exception $e) {
            $errorCode = 'ERR_CATEGORIES_INDEX';
            Log::error("$errorCode: Error al obtener las categorías: " . $e->getMessage());
            return response()->json(['message' => 'Error al obtener las categorías', 'error_code' => $errorCode, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     */
    public function store(StoreRequest $request)
    {
        try {
            $category = Category::create($request->validated());
            return response()->json(['message' => 'Categoría creada correctamente', 'category' => $category]);
        } catch (Exception $e) {
            $errorCode = 'ERR_CATEGORY_STORE';
            Log::error("$errorCode: Error al crear la categoría: " . $e->getMessage());
            return response()->json(['message' => 'Error al crear la categoría', 'error_code' => $errorCode, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Category $category)
    {
        try {
            return response()->json($category);
        } catch (Exception $e) {
            $errorCode = 'ERR_CATEGORY_SHOW';
            Log::error("$errorCode: Error al obtener la categoría: " . $e->getMessage());
            return response()->json(['message' => 'Error al obtener la categoría', 'error_code' => $errorCode, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return response()->json(['message' => 'Categoría actualizada correctamente', 'category' => $category]);
        } catch (Exception $e) {
            $errorCode = 'ERR_CATEGORY_UPDATE';
            Log::error("$errorCode: Error al actualizar la categoría: " . $e->getMessage());
            return response()->json(['message' => 'Error al actualizar la categoría', 'error_code' => $errorCode, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(['message' => 'Categoría eliminada correctamente']);
        } catch (Exception $e) {
            $errorCode = 'ERR_CATEGORY_DESTROY';
            Log::error("$errorCode: Error al eliminar la categoría: " . $e->getMessage());
            return response()->json(['message' => 'Error al eliminar la categoría', 'error_code' => $errorCode, 'error' => $e->getMessage()], 500);
        }
    }
}
