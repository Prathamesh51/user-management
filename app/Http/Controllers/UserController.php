<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = $this->userService->getAllUsers();
            $usersData = UserResource::collection($users);
            return response()->json(['status' => true, 'data' => $usersData], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to retrieve users', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $users = $this->userService->createUser($request->validated());
            if (!$users) {
                return response()->json(['status' => false, 'message' => 'User creation failed'], 500);
            }
            $usersData = new UserResource($users);
            return response()->json(['status' => true, 'data' => $usersData], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to create user', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $users = $this->userService->getUserById($id);
            if (!$users) {
                return response()->json(['status' => false, 'message' => 'User not found'], 404);
            }
            $usersData = new UserResource($users);
            return response()->json(['status' => true, 'data' => $usersData], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to retrieve user', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try {
            $users = $this->userService->updateUser($id, $request->validated());
            if (!$users) {
                return response()->json(['status' => false, 'message' => 'User update failed'], 500);
            }
            $usersData = new UserResource($users);
            return response()->json(['status' => true, 'data' => $usersData], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to update user', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleted = $this->userService->deleteUser($id);
            if (!$deleted) {
                return response()->json(['status' => false, 'message' => 'User deletion failed'], 500);
            }
            return response()->json(['status' => true, 'message' => 'User deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to delete user', 'error' => $e->getMessage()], 500);
        }
    }
}
