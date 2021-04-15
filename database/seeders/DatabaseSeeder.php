<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Masyarakat']);
        
        $admin = User::create([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);

        $masyarakat = User::create([
            'name' => 'Masyarakat',
            'role_id' => 2,
            'email' => 'masyarakat@example.com',
            'password' => Hash::make('masyarakat'),
        ]);
    }
}
