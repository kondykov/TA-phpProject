<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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

        Permission::create(['name' => 'viewDashboard']);
        Permission::create(['name' => 'editUser']);
        Permission::create(['name' => 'createUser']);
        Permission::create(['name' => 'editRolesOrPermissions']);
        Permission::create(['name' => 'createRolesOrPermissions']);
        Permission::create(['name' => 'removeRolesOrPermissions']);

        Permission::create(['name' => 'createPost']);
        Permission::create(['name' => 'editPost']);
        Permission::create(['name' => 'deletePost']);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');

        User::factory(10)->create();
    }
}
