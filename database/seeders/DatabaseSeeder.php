<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'super_admin',
            'administrador',
            'contratista',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $role = Role::create(['name' => 'Super_admin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleContratista = Role::create(['name' => 'Contratista']);

        // Assign permissions to roles
        $role->syncPermissions(Permission::all());
        $roleAdmin->givePermissionTo('administrador');
        $roleContratista->givePermissionTo('contratista');

        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         // Assign role to user
         $user->assignRole($role);
    }
}