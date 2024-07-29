<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        try {
            $users = User::all();
            return $this->sendResponse($users, 'Lista de usuarios');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage())    ;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            return $this->sendResponse($user, 'Usuario creado exitosamente','success', 201);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return $this->sendResponse($user,'Usuario encontrado');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage())    ;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            }else{
                $validated['password'] = $user->password;
            }
            $user->update($validated);
            return $this->sendResponse($user, 'Usuario actualizado correctamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage())    ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return $this->sendResponse([], 'Usuario eliminado exitosamente');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
