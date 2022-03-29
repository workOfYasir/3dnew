<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => '2021-10-04 00:00:00',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => '2021-10-04 00:00:00',
            'remember_token' => Str::random(10),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
