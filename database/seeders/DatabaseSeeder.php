<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456789),
        ]);

        $user2 = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make(123456789),
        ]);

        $user3 = User::create([
            'name' => 'user',
            'email' => 'user1@gmail.com',
            'password' => Hash::make(123456789),
        ]);

        $user4 = User::create([
            'name' => 'user',
            'email' => 'user2@gmail.com',
            'password' => Hash::make(123456789),
        ]);

        $user5 = User::create([
            'name' => 'user',
            'email' => 'user3@gmail.com',
            'password' => Hash::make(123456789),
        ]);

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'create']);
        $role3 = Role::create(['name' => 'read']);
        $role4 = Role::create(['name' => 'update']);
        $role5 = Role::create(['name' => 'delete']);

        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            $key = $route->getName();
            if ($key && !str_starts_with($key, 'generated') && $key !== 'storage.local') {
                $permission = Permission::create([
                    'name' => $key
                ]);

                $role1->givePermissionTo($permission);

                if (!in_array($key, ['read','update','delete'])) {
                    $role2->givePermissionTo($permission);
                }

                if (!in_array($key, ['create','update','delete'])) {
                    $role3->givePermissionTo($permission);
                }

                if (!in_array($key, ['read','create','delete'])) {
                    $role4->givePermissionTo($permission);
                }

                if (!in_array($key, ['read','update','create'])) {
                    $role5->givePermissionTo($permission);
                }
            }
        }
        $user1->assignRole($role1);
        $user2->assignRole($role2);
        $user3->assignRole($role3);
        $user4->assignRole($role4);
        $user5->assignRole($role5);
    }
}
