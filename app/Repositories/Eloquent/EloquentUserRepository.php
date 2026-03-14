<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class EloquentUserRepository implements UserRepository
{
    protected $userModel;
    /**
     * Create a new class instance.
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllUsers()
    {
        return $this->userModel->all();
    }

    public function getUserById($id)
    {
        return $this->userModel->find($id);
    }

    public function createUser(array $data)
    {
        return $this->userModel->create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->getUserById($id);
        if(!$user) {
            return false;
        }
        if ($user) {
            $user->update($data);
            return $user;
        }
        return false;
    }

    public function deleteUser($id)
    {
        $user = $this->getUserById($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}
