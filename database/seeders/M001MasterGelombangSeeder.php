<?php

namespace Database\Seeders;

use App\Models\M001MasterGelombang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M001MasterGelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => '2023/2024 - Gel. 1', 'status' => 1],
            ['nama' => '2023/2024 - Gel. 2', 'status' => 0],
            ['nama' => '2023/2024 - Gel. 3', 'status' => 0],
        ];

        foreach ($data as $item) {
            M001MasterGelombang::create($item);
        }
    }
}
