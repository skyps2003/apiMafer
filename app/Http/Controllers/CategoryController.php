<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryController extends BaseController
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
            $categories = Category::all();
            return $this->sendResponse($categories, 'Lista de categorias');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     */
    public function store(StoreRequest $request)
    {
        try {
            $category = Category::create([
                'name' => $request->name,
                'description' => $request->description ?? '-- Sin descripción --',
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ]);
            return $this->sendResponse($category, 'Categoria creada exitosamente', 'success', 201);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Category $category)
    {
        try {
            return $this->sendResponse($category, 'Categoria encontrada');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        try {
            $category->update([
                'name' => $request->name,
                'description' => $request->description ?? $category->description,
                'updated_by' => Auth::id()
            ]);
            return $this->sendResponse($category, 'Categoria actualizada exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return $this->sendResponse([], 'Categoría eliminada exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
    public function amount()
    {
        try{
            $amount = Category::count();
            return response()->json($amount);
        }catch(Exception $e)
        {
            return $this->sendError($e->getMessage());
        }
    }
}
