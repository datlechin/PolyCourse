<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $users = [
            [
                'name' => 'Ngô Quốc Đạt',
                'username' => 'ngoquocdat',
                'email' => 'datlechin@gmail.com',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                ...$user,
                'password' => bcrypt('123456'),
                'phone' => fake()->e164PhoneNumber(),
                'bio' => fake()->realText(),
                'email_verified_at' => now(),
            ]);
        }
    }
}
