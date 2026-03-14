<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::query()->firstOrCreate(['name' => 'Admin']);

        User::query()->updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'role_id' => $role->id,
                'name' => 'Admin',
                'password' => Hash::make('siddharth'),
            ]
        );
    }
}
