<?php

namespace Database\Seeders;

use App\Models\M006MasterGolonganDarah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M006MasterGolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'A', 'status' => 1],
            ['nama' => 'B', 'status' => 1],
            ['nama' => 'AB', 'status' => 1],
            ['nama' => 'O', 'status' => 1],
        ];

        foreach ($data as $item) {
            M006MasterGolonganDarah::create($item);
        }
    }
}
