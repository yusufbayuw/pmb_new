<?php

namespace Database\Seeders;

use App\Models\M002MasterPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M002MasterPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Tidak Sekolah', 'status' => 1],
            ['nama' => 'SD/MI', 'status' => 1],
            ['nama' => 'SMP/MTs', 'status' => 1],
            ['nama' => 'SMA/SMK/MA', 'status' => 1],
            ['nama' => 'D1', 'status' => 1],
            ['nama' => 'D2', 'status' => 1],
            ['nama' => 'D3', 'status' => 1],
            ['nama' => 'S1', 'status' => 1],
            ['nama' => 'S2', 'status' => 1],
            ['nama' => 'S3', 'status' => 1],
        ];

        foreach ($data as $item) {
            M002MasterPendidikan::create($item);
        }
    }
}
