<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaimsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('claims')->insert([
            [
                'user_id' => '4',
                'restaurant_id' => '1',
                'business_number' => '00560202490223',
                'status' => 'Disetujui',
            ],
        ]);
    }
}
