<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            // Daftar kecamatan di Kota Bandung
            'Andir', 'Antapani', 'Arcamanik', 'Astanaanyar', 'Babakan Ciparay', 'Bandung Kidul',
            'Bandung Kulon', 'Bandung Wetan', 'Batununggal', 'Bojongloa Kaler', 'Bojongloa Kidul',
            'Buahbatu', 'Cibeunying Kaler', 'Cibeunying Kidul', 'Cibiru', 'Cicendo', 'Cidadap',
            'Cinambo', 'Coblong', 'Gedebage', 'Kiaracondong', 'Lengkong', 'Mandalajati',
            'Panyileukan', 'Rancasari', 'Regol', 'Sukajadi', 'Sukasari', 'Sumur Bandung', 'Ujung Berung',

            // Daftar kecamatan di Kabupaten Bandung
            'Bojongsoang', 'Cileunyi', 'Cimenyan', 'Cininten', 'Ciparay', 'Cipeundeuy', 'Cipongkor', 'Cisarua',
            'Dayeuhkolot', 'Ibun', 'Katapang', 'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih',
            'Margahayu', 'Nagreg', 'Pacet', 'Pameungpeuk', 'Pangalengan', 'Paseh', 'Pasirjambu',
            'Ranca Bali', 'Rancaekek', 'Solokan Jeruk', 'Soreang', 'Sukamenak', 'Tanjungsari',
            'Tanjungwangi', 'Tinggalingga',

            // Daftar kecamatan di Kabupaten Bandung Barat
            'Batujajar', 'Cihampelas', 'Cililin', 'Cipatat', 'Cipeundeuy', 'Cipongkor', 'Cisarua',
            'Gununghalu', 'Lembang', 'Ngamprah', 'Padalarang', 'Parongpong', 'Rongga', 'Saguling',
            'Sindangkerta', 'Cililin',

            // Daftar kecamatan di Kabupaten Cimahi
            'Cimahi Selatan', 'Cimahi Tengah', 'Cimahi Utara',

            //Daftar kecamatan di Kabupaten Sumedang
            'Cimalaka', 'Cimanggung', 'Cisarua', 'Cisitu', 'Conggeang', 'Darmaraja', 'Ganeas', 'Jatinangor',
            'Jatigede', 'Jatinunggal', 'Pamulihan', 'Paseh', 'Rancakalong', 'Situraja', 'Sukasari', 'Sukatani',
            'Sumedang Selatan', 'Sumedang Utara', 'Surian', 'Tanjungkerta', 'Tanjungsari', 'Tomo', 'Ujungjaya', 'Wado'
        ];

        $data = [];
        $id = 1;
        foreach ($areas as $area) {
            $data[] = [
                'id' => $id,
                'name' => $area,
            ];
            $id++;
        }

        DB::table('areas')->insert($data);
    }
}
