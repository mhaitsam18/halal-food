<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestaurantHalalCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_halal_certificates')->insert([
            [
                'restaurant_id' => '4',
                'certificate_number' => 'LPPOM-00560202490223',
                'certificate_image' => NULL,
                'certificate_type' => 'Regular',
                'issued_date' => '2022-01-03',
                'expired_date' => '2024-01-03',
                'company_name' => 'CV. Serambi Kelapa',
            ],
            [
                'restaurant_id' => '5',
                'certificate_number' => 'LPPOM-00160202490223',
                'certificate_image' => NULL,
                'certificate_type' => 'Self Declare',
                'issued_date' => '2024-01-03',
                'expired_date' => '2026-01-03',
                'company_name' => 'CV. Bumi Rasa',
            ],
            [
                'restaurant_id' => '6',
                'certificate_number' => 'LPPOM-00260202490223',
                'certificate_image' => NULL,
                'certificate_type' => 'Self Declare',
                'issued_date' => '2024-01-03',
                'expired_date' => '2026-01-03',
                'company_name' => 'CV. Sari Lestari',
            ],
            [
                'restaurant_id' => '7',
                'certificate_number' => 'LPPOM-00360202490223',
                'certificate_image' => NULL,
                'certificate_type' => 'Regular',
                'issued_date' => '2024-01-03',
                'expired_date' => '2026-01-03',
                'company_name' => 'CV. Delapan Kopi',
            ],
        ]);
    }
}
