<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Account',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionsAdmin = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissionsAdmin);
        $admin->assignRole([$roleAdmin->id]);

        $usersData = [
            [
                'name' => 'Muhammad Ichsan',
                'email' => 'customer1@test.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Agung',
                'email' => 'customer2@test.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Jamal',
                'email' => 'customer3@test.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Sueb',
                'email' => 'customer4@test.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Paloy',
                'email' => 'customer5@test.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => Str::random(10),
            ],
        ];
        foreach ($usersData as $userData) {
            $user = User::create($userData);

            // Check if 'user' role already exists
            $roleUser = Role::where('name', 'user')->first();

            if (!$roleUser) {
                $roleUser = Role::create(['name' => 'user']);
                $permissions = [
                    'transaction-list',
                    'history-list',
                ];
                $roleUser->syncPermissions($permissions);
            }

            $user->assignRole([$roleUser->id]);
        }
    }
}
