<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            return response()->json($users);
        } catch (Exception $e) {
            Log::error('Error al obtener los usuarios: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los usuarios'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            return response()->json(['message' => 'Usuario creado con éxito', 'user' => new $user], 201);
        } catch (Exception $e) {
            Log::error('Error al crear el usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al crear el usuario'. $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return response()->json($user);
        } catch (Exception $e) {
            Log::error('Error al obtener el usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener el usuario'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            $user->update($data);
            return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => new $user], 200);
        } catch (Exception $e) {
            Log::error('Error al actualizar el usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al actualizar el usuario'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
        } catch (Exception $e) {
            Log::error('Error al eliminar el usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al eliminar el usuario'], 500);
        }
    }
}
