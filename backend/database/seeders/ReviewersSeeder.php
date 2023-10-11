<?php

namespace Database\Seeders;

use App\Models\Reviewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviewers = [
            [
                'restaurant_id' => 1,
                'user_id' => 4,
            ],
            [
                'restaurant_id' => 2,
                'user_id' => 4,
            ],
            [
                'restaurant_id' => 3,
                'user_id' => 4,
            ],
        ];

        foreach ($reviewers as $data) {
            Reviewer::create([
                'restaurant_id' => $data['restaurant_id'],
                'user_id' => $data['user_id'],
            ]);
        }
    }
}
