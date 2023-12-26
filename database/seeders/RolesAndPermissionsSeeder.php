<?php

namespace Database\Seeders;

// database/seeders/RolesAndPermissionsSeeder.php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions
        $permissions = [
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
            // Add more permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        $employerRole = Role::create(['name' => 'employer']);
        // You can assign specific permissions to the employer role if needed

        $userRole = Role::create(['name' => 'user']);
        // You can assign specific permissions to the user role if needed
    }
}

