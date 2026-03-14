<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Admin', 'Sub Admin', 'Manager', 'Editor', 'User'] as $roleName) {
            Role::query()->firstOrCreate(['name' => $roleName]);
        }
    }
}
