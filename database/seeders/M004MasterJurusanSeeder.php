<?php

namespace Database\Seeders;

use App\Models\M004MasterJurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M004MasterJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'D3 Sekretari', 'status' => 1],
            ['nama' => 'D3 Penyaji Musik', 'status' => 1],
            ['nama' => 'S1 Manajemen', 'status' => 1],
            ['nama' => 'S1 Seni Musik', 'status' => 1],
            ['nama' => 'S1 Rekayasa Logistik', 'status' => 1],
            ['nama' => 'S1 Informatika', 'status' => 1],
            ['nama' => 'S1 Sains Data', 'status' => 1],
        ];

        foreach ($data as $item) {
            M004MasterJurusan::create($item);
        }
    }
}
