<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserService
{
    protected $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return Cache::remember('users_all', 60, function () {
            return $this->userRepository->getAllUsers();
        });
    }

    public function getUserById($id)
    {
        return Cache::remember("user:{$id}", 60, function () use ($id) {
            return $this->userRepository->getUserById($id);
        });
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->createUser($data);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->userRepository->updateUser($id, $data);
        Cache::forget("user_$id");
        Cache::forget('users_all');
        return $user;
    }

    public function deleteUser($id)
    {
        $deleted = $this->userRepository->deleteUser($id);
        Cache::forget("user_$id");
        Cache::forget('users_all');
        return $deleted;
    }
}
