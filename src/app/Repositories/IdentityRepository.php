<?php

namespace App\Repositories;

use App\Contracts\IdentityRepositoryInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Webmozart\Assert\Assert;

class IdentityRepository implements IdentityRepositoryInterface
{

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function getByEmail(string $email)
    {
        // TODO: Implement getByEmail() method.
    }

    public function CreateRole(string $roleName, ?array $permissions = [])
    {
        $roleExists = Role::exists($roleName);

        Assert::notNull($roleExists);

        $role = new Role();
        $role->name = $roleName;
        if ($permissions) {
            $role->permissions = $permissions;
        }
        $role->save();
    }

    public function CreateUser(User $user)
    {
        // TODO: Implement CreateUser() method.
    }
}
