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
                'username' => 'quocdat',
                'email' => 'datnqpd05994@fpt.edu.vn',
            ],
            [
                'name' => 'Huỳnh Kim Phú',
                'username' => 'kimphu',
                'email' => 'phuhkps25439@fpt.edu.vn',
            ],
            [
                'name' => 'Nguyễn Đức Lập',
                'username' => 'duclapp',
                'email' => 'lapndps24157@fpt.edu.vn',
            ],
            [
                'name' => 'Phạm Ngọc Đạt',
                'username' => 'ngocdat',
                'email' => 'datpnps24143@fpt.edu.vn',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                ...$user,
                'password' => Hash::make('123456'),
                'phone' => fake()->e164PhoneNumber(),
                'bio' => fake()->realText(),
                'email_verified_at' => now(),
            ]);
        }
    }
}
