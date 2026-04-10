<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = Role::query()->firstOrCreate(['name' => 'SuperAdmin']);

        User::query()->updateOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'role_id' => $role->id,
                'name' => 'SuperAdmin',
                'password' => Hash::make('superadmin'),
            ]
        );
    }
}
