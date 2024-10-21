<?php

namespace Database\Seeders;

use App\Models\M001MasterGelombang;
use App\Models\M007VirtualAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M007VirtualAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gelombang_id = M001MasterGelombang::where('status', 1)->first()->id;

        $data = [
            ['gelombang_id' => $gelombang_id, 'bank' => 'Bank Mandiri', 'nomor' => '1234567890', 'status' => 1],
            ['gelombang_id' => $gelombang_id, 'bank' => 'Bank BRI', 'nomor' => '0987654321', 'status' => 1],
            ['gelombang_id' => $gelombang_id, 'bank' => 'Bank BNI', 'nomor' => '1122334455', 'status' => 1],
            ['gelombang_id' => $gelombang_id, 'bank' => 'Bank BCA', 'nomor' => '6677889900', 'status' => 1],
        ];

        foreach ($data as $item) {
            M007VirtualAccount::create($item);
        }
    }
}
