<?php

namespace Database\Seeders;

use App\Models\M005MasterAgama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M005MasterAgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Islam', 'status' => 1],
            ['nama' => 'Kristen', 'status' => 1],
            ['nama' => 'Katholik', 'status' => 1],
            ['nama' => 'Hindu', 'status' => 1],
            ['nama' => 'Buddha', 'status' => 1],
            ['nama' => 'Konghucu', 'status' => 1],
        ];

        foreach ($data as $item) {
            M005MasterAgama::create($item);
        }
    }
}
