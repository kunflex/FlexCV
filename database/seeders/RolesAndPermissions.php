<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = Role::create(['name' => 'user']);
        $admin = Role::create(['name' => 'admin']);
        $employer = Role::create(['name' => 'employer']);

        $permission1 = Permission::create(['name' => 'manage users']);
        $permission2 = Permission::create(['name' => 'manage employers']);
        $permission3 = Permission::create(['name' => 'create tool']);

         // Assign Permissions to Roles
        $admin->syncPermissions([
            $permission1,
            $permission2,
            $permission3,
        ]);
    }
}
