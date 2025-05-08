<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
        ]);

        $admin_user->assignRole('admin');


        $employer = User::create([
            'name' => 'Employer',
            'email' => 'employer@gmail.com',
            'password' => bcrypt('employer@gmail.com'),
        ]);

        $employer->assignRole('employer');

        $default_user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user@gmail.com'),
        ]);

        $default_user->assignRole('user');
    }
}
