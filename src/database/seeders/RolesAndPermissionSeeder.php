<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'writer'])
            ->givePermissionTo('edit');

        Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish', 'unpublish']);

        Role::create(['name' => 'super-user'])
            ->givePermissionTo(Permission::all());
    }
}
