<?php

namespace Database\Seeders;

use App\Models\CertificateReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $certificateReport = [
            [
                'restaurant_id' => 1,
                'reviewer_id' => 4,
                'bahan_baku' => ['Agar-Agar'],
                'bahan_olahan' => ['Agar-Agar'],
                'bahan_tambahan' => ['Agar-Agar'],
                'bahan_penolong' => ['Agar-Agar'],
                'status_menu' => 'Halal',
                'alasan' => 'Halal',
            ],
            [
                'restaurant_id' => 2,
                'reviewer_id' => 5,
                'bahan_baku' => ['Agar-Agar'],
                'bahan_olahan' => ['Agar-Agar'],
                'bahan_tambahan' => ['Agar-Agar'],
                'bahan_penolong' => ['Agar-Agar'],
                'status_menu' => 'Halal',
                'alasan' => 'Halal',
            ],
            [
                'restaurant_id' => 3,
                'reviewer_id' => 6,
                'bahan_baku' => ['Agar-Agar'],
                'bahan_olahan' => ['Agar-Agar'],
                'bahan_tambahan' => ['Agar-Agar'],
                'bahan_penolong' => ['Agar-Agar'],
                'status_menu' => 'Halal',
                'alasan' => 'Halal',
            ],
            [
                'restaurant_id' => 1,
                'reviewer_id' => 1,
                'bahan_baku' => ['Agar-Agar'],
                'bahan_olahan' => ['Agar-Agar'],
                'bahan_tambahan' => ['Agar-Agar'],
                'bahan_penolong' => ['Agar-Agar'],
                'status_menu' => 'Non Halal',
                'alasan' => 'Halal',
            ],
            [
                'restaurant_id' => 2,
                'reviewer_id' => 2,
                'bahan_baku' => ['Agar-Agar'],
                'bahan_olahan' => ['Agar-Agar'],
                'bahan_tambahan' => ['Agar-Agar'],
                'bahan_penolong' => ['Agar-Agar'],
                'status_menu' => 'Halal',
                'alasan' => 'Halal',
            ],
        ];

        foreach ($certificateReport as $data) {
            CertificateReport::create([
                'restaurant_id' => $data['restaurant_id'],
                'reviewer_id' => $data['reviewer_id'],
                'bahan_baku' => json_encode($data['bahan_baku']),
                'bahan_olahan' => json_encode($data['bahan_olahan']),
                'bahan_tambahan' => json_encode($data['bahan_tambahan']),
                'bahan_penolong' => json_encode($data['bahan_penolong']),
                'status_menu' => $data['status_menu'],
                'alasan' => $data['alasan'],
            ]);
        }
    }
}
