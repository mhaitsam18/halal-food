<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'johndoe',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'user',
                'profile_picture' => 'avatar-1.png',
                'phone_number' => NULL,
                'address' => NULL,
                'experience' => NULL,
                'certificate' => NULL,
            ],
            [
                'username' => 'annisarisma',
                'first_name' => 'Annisa',
                'last_name' => 'Risma',
                'email' => 'annisarisma117@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'kontributor',
                'profile_picture' => 'avatar-1.png',
                'phone_number' => '082123456789',
                'address' => 'Jl. Sukabirus Gg. Demang I No. 148',
                'experience' => 'Penyelia Halal. FSSC certified.',
                'certificate' => '400-01-13-106.jpg',
            ],
            [
                'username' => 'ersanurm',
                'first_name' => 'Ersa',
                'last_name' => 'Nur Maulana',
                'email' => 'ersanur@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'kontributor',
                'profile_picture' => 'avatar-1.png',
                'phone_number' => '082123456789',
                'address' => 'Jl. Sukabirus Gg. Demang I No. 148',
                'experience' => 'Penyelia Halal. FSSC certified.',
                'certificate' => '400-01-13-106.jpg',
            ],
            [
                'username' => 'alfasafira',
                'first_name' => 'Alfa',
                'last_name' => 'Safira',
                'email' => 'alfa@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'kontributor',
                'profile_picture' => 'avatar-1.png',
                'phone_number' => '082123456789',
                'address' => 'Jl. Sukabirus Gg. Demang I No. 148',
                'experience' => 'Penyelia Halal. FSSC certified.',
                'certificate' => '400-01-13-106.jpg',
            ],
            [
                'username' => 'soyakarerra',
                'first_name' => 'Soya',
                'last_name' => 'Karerra',
                'email' => 'soya@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'kontributor',
                'profile_picture' => 'avatar-1.png',
                'phone_number' => '082123456789',
                'address' => 'Jl. Sukabirus Gg. Demang I No. 148',
                'experience' => 'Penyelia Halal. FSSC certified.',
                'certificate' => '400-01-13-106.jpg',
            ],
            [
                'username' => 'superadmin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'superadmin',
                'profile_picture' => 'avatar-1.png',
                'phone_number' => '082123456789',
                'address' => 'Jl. Sukabirus Gg. Demang I No. 148',
                'experience' => NULL,
                'certificate' => NULL,
            ],
        ]);
    }
}
