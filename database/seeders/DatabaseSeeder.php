<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(M001MasterGelombangSeeder::class);
        $this->call(M002MasterPendidikanSeeder::class);
        $this->call(M003MasterPekerjaanSeeder::class);
        $this->call(M004MasterJurusanSeeder::class);
        $this->call(M005MasterAgamaSeeder::class);
        $this->call(M006MasterGolonganDarahSeeder::class);
        $this->call(M007VirtualAccountSeeder::class);
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@demo.com',
            'password' => 'demo123'
        ]);
    }
}
