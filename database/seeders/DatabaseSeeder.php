<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            CourseSeeder::class,
            CourseRequirementSeeder::class,
            CourseLearnGoalSeeder::class,
        ]);
    }
}
