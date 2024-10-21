<?php

namespace Database\Seeders;

use App\Models\M003MasterPekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M003MasterPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Belum/Tidak Bekerja', 'status' => 1],
            ['nama' => 'Pelajar/Mahasiswa', 'status' => 1],
            ['nama' => 'Pegawai Negeri Sipil (PNS)', 'status' => 1],
            ['nama' => 'TNI', 'status' => 1],
            ['nama' => 'Polri', 'status' => 1],
            ['nama' => 'Karyawan Swasta', 'status' => 1],
            ['nama' => 'Pegawai BUMN', 'status' => 1],
            ['nama' => 'Buruh', 'status' => 1],
            ['nama' => 'Wiraswasta', 'status' => 1],
            ['nama' => 'Petani/Peternak', 'status' => 1],
            ['nama' => 'Nelayan', 'status' => 1],
            ['nama' => 'Pensiunan', 'status' => 1],
            ['nama' => 'Ibu Rumah Tangga', 'status' => 1],
            ['nama' => 'Pekerjaan Lainnya', 'status' => 1],
        ];

        foreach ($data as $item) {
            M003MasterPekerjaan::create($item);
        }
    }
}
