<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage users',
            'approve members',
            'view reports',
            'edit profile',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $admin   = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $staff   = Role::firstOrCreate(['name' => 'staff']);
        $member  = Role::firstOrCreate(['name' => 'member']);

        $admin->givePermissionTo(['manage users', 'approve members', 'view reports', 'edit profile']);
        $manager->givePermissionTo(['approve members', 'view reports']);
        $staff->givePermissionTo(['approve members']);
        $member->givePermissionTo(['edit profile']);
    }
}
