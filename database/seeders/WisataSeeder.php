<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wisata;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Pantai Indah',
                'jenis_wisata' => 'Wisata Air',
                'fasilitas_wisata' => 'Toilet, Tempat Parkir, Restoran',
                'latitude' => '-7.123456',
                'longitude' => '110.654321',
            ],
            [
                'nama' => 'Gunung Sejuk',
                'jenis_wisata' => 'Wisata Alam',
                'fasilitas_wisata' => 'Kamping, Toilet, Mushola',
                'latitude' => '-7.543210',
                'longitude' => '110.123456',
            ],
            [
                'nama' => 'danau',
                'jenis_wisata' => 'Wisata Alam',
                'fasilitas_wisata' => 'Mushola, Toilet, Tempat Parkir',
                'latitude' => '-7.678910',
                'longitude' => '110.111213',
            ],
        ];

        foreach ($data as $item) {
            Wisata::create($item);
        }
    }
}
