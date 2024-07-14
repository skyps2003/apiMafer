<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRole\StoreRequest;
use App\Http\Requests\UserRole\UpdateRequest;
use App\Models\UserRole;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userRoles = UserRole::with('rol', 'user')->get();
            return response()->json($userRoles);
        } catch (Exception $e) {
            Log::error('Error al obtener los roles de usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los roles de usuario'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();

            // Verificar si el usuario ya tiene un rol asignado
            $existingUserRole = UserRole::where('user_id', $data['user_id'])->first();
            if ($existingUserRole) {
                return response()->json(['message' => 'El usuario ya tiene un rol asignado.'], 400);
            }

            // Verificar si ya hay dos gerentes
            $gerentesCount = UserRole::where('rol_id', 1)->count();
            if ($data['rol_id'] == 1 && $gerentesCount >= 2) {
                return response()->json(['message' => 'No se pueden asignar más de dos gerentes.'], 400);
            }

            $userRole = UserRole::create($data);
            return response()->json(['message' => 'Rol de usuario creado con éxito', 'userRole' => $userRole], 201);
        } catch (Exception $e) {
            Log::error('Error al crear el rol de usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al crear el rol de usuario', 'error' => $e->getMessage()], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(UserRole $userRole)
    {
        try {
            return response()->json($userRole);
        } catch (Exception $e) {
            Log::error('Error al obtener el rol de usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener el rol de usuario'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, UserRole $userRole)
    {
        try {
            $data = $request->validated();

            $existingUserRole = UserRole::where('user_id', $data['user_id'])->where('id', '!=', $userRole->id)->first();
            if ($existingUserRole) {
                return response()->json(['message' => 'El usuario ya tiene un rol asignado.'], 400);
            }

            $gerentesCount = UserRole::where('rol_id', 1)->count();
            if ($data['rol_id'] == 1 && $gerentesCount >= 2 && $userRole->rol_id != 1) {
                return response()->json(['message' => 'No se pueden asignar más de dos gerentes.'], 400);
            }

            $userRole->update($data);
            return response()->json(['message' => 'Rol de usuario actualizado con éxito', 'userRole' => $userRole], 200);
        } catch (Exception $e) {
            Log::error('Error al actualizar el rol de usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al actualizar el rol de usuario', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $userRole)
    {
        try {
            $userRole->delete();
            return response()->json(['message' => 'Rol de usuario eliminado con éxito'], 200);
        } catch (Exception $e) {
            Log::error('Error al eliminar el rol de usuario: ' . $e->getMessage());
            return response()->json(['message' => 'Error al eliminar el rol de usuario', 'error' => $e->getMessage()], 500);
        }
    }

    public function role($id)
    {
        $userRole = UserRole::findOrFail($id);

        if ($userRole->status == 0) {
            $newStatus = 1;
        } else {
            $newStatus = 0;
        }

        $userRole->update([
            'status' => $newStatus
        ]);

        $message = $newStatus == 0 ? 'Usuario bloqueado' : 'Usuario desbloqueado';
        return response()->json(['message' => $message, 'status' => $userRole->status], 200);
    }
}
