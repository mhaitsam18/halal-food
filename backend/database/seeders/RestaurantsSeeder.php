<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Imports\MenuImport;
use App\Models\Reviewer;
use Maatwebsite\Excel\Facades\Excel;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = Carbon::now()->subDays(15)->format('Y-m-d');
        $deadline = Carbon::now()->subDays(10)->format('Y-m-d');

        $created_at2 = Carbon::now()->subDays(10)->format('Y-m-d');
        $deadline2 = Carbon::now()->subDays(5)->format('Y-m-d');

        $restaurants = [
            [
                'user_id' => 1,
                'name' => 'Warung Sunda Rasa',
                'full_address' => 'Jalan Merdeka No. 123, Bandung, Jawa Barat',
                'area' => 4,
                'owner_name' => 'Ahmad Surya',
                'phone_number' => '086754565443',
                'deadline' => $deadline,
                'filename_menu' => 'restaurant-menu-template-01.xlsx',
                'status' => 'Menunggu Kontributor',
                'images' => [
                    'WarungSundaRasa-01.jpg',
                    'WarungSundaRasa-02.jpg',
                    'WarungSundaRasa-03.jpg',
                    'WarungSundaRasa-04.jpg',
                    'WarungSundaRasa-05.jpg',

                ],
                'created_at' => $created_at,
            ],
            [
                'user_id' => 1,
                'name' => 'Sate Kambing Bakar Bandung',
                'full_address' => 'Jalan Riau No. 789, Bandung, Jawa Barat',
                'area' => 3,
                'owner_name' => 'Asep Riyanto',
                'phone_number' => '086754565443',
                'deadline' => $deadline,
                'filename_menu' => 'restaurant-menu-template-02.xlsx',
                'status' => 'Menunggu Kontributor',
                'images' => [
                    'SateKambingBakar-01.jpg',
                    'SateKambingBakar-02.jpg',
                    'SateKambingBakar-03.jpg',
                    'SateKambingBakar-04.jpg',
                    'SateKambingBakar-05.jpg',

                ],
                'created_at' => $created_at,
            ],
            [
                'user_id' => 1,
                'name' => 'Depot Es Krim Bandung',
                'full_address' => 'Jalan Dago No. 101, Bandung, Jawa Barat',
                'area' => 2,
                'owner_name' => 'Rina Setiawati',
                'phone_number' => '086754565443',
                'deadline' => $deadline2,
                'filename_menu' => 'restaurant-menu-template-03.xlsx',
                'status' => 'Menunggu Kontributor',
                'images' => [
                    'DepotEsKrim-01.jpg',
                    'DepotEsKrim-02.jpg',
                    'DepotEsKrim-03.jpg',
                    'DepotEsKrim-04.jpg',
                    'DepotEsKrim-05.jpg',

                ],
                'created_at' => $created_at2,
            ],
            [
                'user_id' => 5,
                'name' => 'Serambi Nusantara',
                'full_address' => 'Jalan Braga No. 15, Bandung, Jawa Barat',
                'area' => 7,
                'owner_name' => 'Ahmad Hidayat',
                'phone_number' => '081234567890',
                'deadline' => NULL,
                'filename_menu' => NULL,
                'status' => NULL,
                'images' => NULL,
                'created_at' => $created_at2,
            ],
            [
                'user_id' => 5,
                'name' => 'Serba Sedap Eatery',
                'full_address' => 'Jalan Setiabudhi No. 78, Bandung, Jawa Barat',
                'area' => 12,
                'owner_name' => 'Siti Rahayu',
                'phone_number' => '087654321098',
                'deadline' => null,
                'filename_menu' => null,
                'status' => null,
                'images' => null,
                'created_at' => $created_at2,
            ],
            [
                'user_id' => 5,
                'name' => 'Frosty Cuppa Es Krim dan Teh',
                'full_address' => 'Jalan Riau No. 45, Bandung, Jawa Barat',
                'area' => 6,
                'owner_name' => 'Budi Santoso',
                'phone_number' => '089876543210',
                'deadline' => null,
                'filename_menu' => null,
                'status' => null,
                'images' => null,
                'created_at' => $created_at2,
            ],
            [
                'user_id' => 5,
                'name' => 'Icy Bliss Cafe',
                'full_address' => 'Jalan Pajajaran No. 89, Bandung, Jawa Barat',
                'area' => 22,
                'owner_name' => 'Dewi Anggraini',
                'phone_number' => '085678912345',
                'deadline' => null,
                'filename_menu' => null,
                'status' => null,
                'images' => null,
                'created_at' => $created_at2,
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Storage::copy('public/seederFile/' . $restaurant['filename_menu'], 'public/menu/' . $restaurant['filename_menu']);
            $resto_menu = storage_path('app/public/menu/' . $restaurant['filename_menu']);
            $resto = Restaurant::create([
                'user_id' => $restaurant['user_id'],
                'name' => $restaurant['name'],
                'full_address' => $restaurant['full_address'],
                'area_id' => $restaurant['area'],
                'owner_name' => $restaurant['owner_name'],
                'phone_number' => $restaurant['phone_number'],
                'deadline' => $restaurant['deadline'],
                'filename_menu' => $restaurant['filename_menu'],
                'status' => $restaurant['status'],
                'created_at' => $restaurant['created_at'],
            ]);

            $restaurantId = $resto->id;

            if ($restaurant['filename_menu']) {
                Excel::import(new MenuImport($restaurantId), $resto_menu);
            }

            if ($restaurant['images']) {
                foreach ($restaurant['images'] as $image) {
                    Storage::copy('public/seederImage/' . $image, 'public/images/' . $image);
                    Image::create([
                        'restaurant_id' => $resto->id,
                        'name' => $image
                    ]);
                }
            }

            Reviewer::create([
                'restaurant_id' => $restaurantId,
                'user_id' => $restaurant['user_id']
            ]);
        }
    }
}
