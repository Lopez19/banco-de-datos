<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'editor']);

        Permission::create(['name' => 'crear_saber']);
        Permission::create(['name' => 'editar_saber']);
        Permission::create(['name' => 'eliminar_saber']);
        Permission::create(['name' => 'ver_saber']);

        $role = Role::findByName('admin');
        $role->givePermissionTo(['crear_saber', 'editar_saber', 'eliminar_saber', 'ver_saber']);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            "password" => Hash::make('password')
        ]);

        $user->assignRole('admin');
    }
}
