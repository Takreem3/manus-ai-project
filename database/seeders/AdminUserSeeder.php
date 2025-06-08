<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'country' => 'United States',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $admin->roles()->attach($adminRole);
        }

        // Create a demo member
        $member = User::create([
            'first_name' => 'Member',
            'last_name' => 'User',
            'email' => 'member@example.com',
            'phone' => '0987654321',
            'country' => 'United States',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'sponsor_id' => $admin->id,
        ]);

        $memberRole = Role::where('name', 'member')->first();
        if ($memberRole) {
            $member->roles()->attach($memberRole);
        }
    }
}
