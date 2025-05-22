<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $userRole = Role::where('name', RoleEnum::USER->value)->first();
        $adminRole = Role::where('name', RoleEnum::ADMIN->value)->first();

        $user = User::factory()->create([
            'email' => 'user@example.com',
        ]);
        $user->roles()->attach($userRole);

        $admin = User::factory()->create([
            'email' => 'admin@example.com',
        ]);
        $admin->roles()->attach($adminRole);
    }
}
