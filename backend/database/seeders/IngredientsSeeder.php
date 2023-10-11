<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'Agar-Agar'
            ],
            [
                'name' => 'Asam Sitrat'
            ],
            [
                'name' => 'Ayam'
            ],
            [
                'name' => 'Bawang Merah'
            ],
            [
                'name' => 'Biskuit'
            ],
            [
                'name' => 'Daging Sapi'
            ],
            [
                'name' => 'Emulsifer'
            ],
            [
                'name' => 'Garam'
            ],
            [
                'name' => 'Gelatin'
            ],
            [
                'name' => 'Ikan'
            ],
            [
                'name' => 'Jagung'
            ],
            [
                'name' => 'Kacang Mete'
            ],
            [
                'name' => 'Kecap Manis'
            ],
            [
                'name' => 'Keju'
            ],
            [
                'name' => 'Kentang'
            ],
            [
                'name' => 'Kubis'
            ],
            [
                'name' => 'Lada Hitam'
            ],
            [
                'name' => 'Mentega'
            ],
            [
                'name' => 'Minyak Kelapa Sawit'
            ],
            [
                'name' => 'Pasta Tomat'
            ],
            [
                'name' => 'Permen'
            ],
            [
                'name' => 'Pewarna Makanan'
            ],
            [
                'name' => 'Roti'
            ],
            [
                'name' => 'Saus Sambal'
            ],
            [
                'name' => 'Saus Salad'
            ],
            [
                'name' => 'Saut Tomat'
            ],
            [
                'name' => 'Sereal'
            ],
            [
                'name' => 'Sirup'
            ],
            [
                'name' => 'Susu'
            ],
            [
                'name' => 'Tepung Roti'
            ],
            [
                'name' => 'Tepung Terigu'
            ],
            [
                'name' => 'Telur'
            ],
        ]);
    }
}
