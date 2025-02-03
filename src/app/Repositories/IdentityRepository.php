<?php

namespace App\Repositories;

use App\Contracts\IdentityRepositoryInterface;
use App\Models\User;
use Spatie\Permission\Models\Permission;
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

    public function CreateRole(string $roleName, ?array $permissionsIds = [])
    {
        $roleExists = Role::exists($roleName);

        Assert::true($roleExists);

        $permissions = [];
        foreach (array_keys($permissionsIds) as $permissionId) {
            $permissions[] = Permission::findById($permissionId);
        }


        $role = new Role();
        $role->name = $roleName;
        $role->save();
        $role->givePermissionTo(array_values($permissions));
    }

    public function CreateUser(User $user)
    {
        // TODO: Implement CreateUser() method.
    }

    public function UpdateRole(int $id, string $roleName, ?array $permissionsIds = [])
    {
        $roleExists = Role::exists($roleName);

        Assert::true($roleExists);

        $permissions = [];
        foreach (array_keys($permissionsIds) as $permissionId) {
            $permissions[] = Permission::findById($permissionId);
        }
        $role = Role::findById($id);
        $role->name = $roleName;
        $role->syncPermissions($permissions);
        $role->save();
    }

    public function DeleteRole(int $id)
    {
        if($id == 1) {
            return false;
        }

        $roleExists = Role::findById($id);
        if ($roleExists) {
            $roleExists->delete();
            return true;
        }

        return false;
    }
}
