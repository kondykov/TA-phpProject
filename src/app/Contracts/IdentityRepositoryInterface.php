<?php

namespace App\Contracts;

use App\Models\User;
use Spatie\Permission\Models\Role;

interface IdentityRepositoryInterface
{
    public function getById(int $id);

    public function getByEmail(string $email);

    public function CreateRole(string $roleName, ?array $permissions = []);
    public function CreateUser(User $user);
}
