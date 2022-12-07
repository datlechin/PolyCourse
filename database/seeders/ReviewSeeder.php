<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::truncate();

        $reviews = [];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
