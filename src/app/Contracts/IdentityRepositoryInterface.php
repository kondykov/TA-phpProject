<?php

namespace App\Contracts;

use App\Models\User;
use Spatie\Permission\Models\Role;

interface IdentityRepositoryInterface
{
    public function getById(int $id);

    public function getByEmail(string $email);

    public function CreateRole(string $roleName, ?array $permissionsIds = []);

    public function UpdateRole(int $id, string $roleName, ?array $permissionsIds = []);
    public function DeleteRole(int $id);
    public function CreateUser(User $user);
}
