<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use SplFileInfo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->uploadFiles('posts');
        $this->uploadFiles('courses');

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CourseSeeder::class,
            CourseRequirementSeeder::class,
            CourseLearnGoalSeeder::class,
        ]);
    }

    protected function uploadFiles(string $folder): void
    {
        $path = database_path('seeders/files/'.$folder);

        if (! is_dir($path)) {
            return;
        }

        $files = scandir($path);

        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            Storage::disk('public')->putFileAs($folder, new SplFileInfo($path.'/'.$file), $file);
        }
    }
}
