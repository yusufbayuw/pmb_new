<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class M008StudentRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m008_student_registrations')->insert([
            [
                'gelombang_id' => 1,
                'nik' => '3201012345678901',
                'nama_lengkap' => 'Ahmad Fauzi',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-01-15',
                'alamat_di_bandung' => 'Jl. Merdeka No. 15',
                'no_telp_handphone' => '081234567890',
                'kelurahan' => 'Cihapit',
                'kecamatan' => 'Bandung Wetan',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusuf.wicaksono@tarunabakti.or.id',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 3 Bandung',
                'alamat_sekolah' => 'Jl. Belitung No. 8, Bandung',
                'golongan_darah_id' => 2,
                'nik_ayah' => '3201012345678902',
                'nama_ayah' => 'Budi Santoso',
                'alamat_rumah_ayah' => 'Jl. Merdeka No. 15',
                'no_telp_handphone_ayah' => '081234567891',
                'email_ayah' => 'budi.santoso@gmail.com',
                'pendidikan_ayah_id' => 3,
                'pekerjaan_ayah_id' => 1,
                'nik_ibu' => '3201012345678903',
                'nama_ibu' => 'Ani Suryani',
                'alamat_rumah_ibu' => 'Jl. Merdeka No. 15',
                'no_telp_handphone_ibu' => '081234567892',
                'email_ibu' => 'ani.suryani@gmail.com',
                'pendidikan_ibu_id' => 3,
                'pekerjaan_ibu_id' => 2,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Lomba Sains", "tingkat"=> "Kabupaten/Kota"],
                    ["prestasi"=> "Juara 2 Lomba Matematika", "tingkat"=> "Provinsi"],
                    ["prestasi"=> "Juara 3 Lomba Fisika", "tingkat"=> "Nasional"],
                ]),
                'sumbangan_sukarela' => 500000,
                'status' => 1,
                'pilihan_1' => 1,
                'pilihan_2' => 2,
                'pilihan_3' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           [
                'gelombang_id' => 1,
                'nik' => '3201023456789012',
                'nama_lengkap' => 'Putri Ananda',
                'tempat_lahir' => 'Cimahi',
                'tanggal_lahir' => '2006-03-12',
                'alamat_di_bandung' => 'Jl. Braga No. 10',
                'no_telp_handphone' => '082345678901',
                'kelurahan' => 'Braga',
                'kecamatan' => 'Sumur Bandung',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusuf.wicaksono@tarunabakti.or.id',
                'agama_id' => 2,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMK Negeri 2 Bandung',
                'alamat_sekolah' => 'Jl. Cihampelas No. 64, Bandung',
                'golongan_darah_id' => 1,
                'nik_ayah' => '3201023456789013',
                'nama_ayah' => 'Dedi Kurniawan',
                'alamat_rumah_ayah' => 'Jl. Braga No. 10',
                'no_telp_handphone_ayah' => '082345678902',
                'email_ayah' => 'dedi.kurniawan@gmail.com',
                'pendidikan_ayah_id' => 2,
                'pekerjaan_ayah_id' => 2,
                'nik_ibu' => '3201023456789014',
                'nama_ibu' => 'Siti Rahayu',
                'alamat_rumah_ibu' => 'Jl. Braga No. 10',
                'no_telp_handphone_ibu' => '082345678903',
                'email_ibu' => 'siti.rahayu@gmail.com',
                'pendidikan_ibu_id' => 2,
                'pekerjaan_ibu_id' => 3,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Debat Bahasa Inggris", "tingkat"=> "Provinsi"],
                    ["prestasi"=> "Juara 1 Lomba Pidato", "tingkat"=> "Kabupaten/Kota"]
                ]),
                'sumbangan_sukarela' => 1000000,
                'status' => 1,
                'pilihan_1' => 2,
                'pilihan_2' => 3,
                'pilihan_3' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201034567890123',
                'nama_lengkap' => 'Rina Kartika',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-05-17',
                'alamat_di_bandung' => 'Jl. Dago No. 23',
                'no_telp_handphone' => '083456789012',
                'kelurahan' => 'Dago',
                'kecamatan' => 'Coblong',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusuf.wicaksono@tarunabakti.or.id',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 5 Bandung',
                'alamat_sekolah' => 'Jl. Hayam Wuruk No. 25, Bandung',
                'golongan_darah_id' => 2,
                'nik_ayah' => '3201034567890124',
                'nama_ayah' => 'Joko Prayitno',
                'alamat_rumah_ayah' => 'Jl. Dago No. 23',
                'no_telp_handphone_ayah' => '083456789013',
                'email_ayah' => 'joko.prayitno@gmail.com',
                'pendidikan_ayah_id' => 4,
                'pekerjaan_ayah_id' => 3,
                'nik_ibu' => '3201034567890125',
                'nama_ibu' => 'Sri Handayani',
                'alamat_rumah_ibu' => 'Jl. Dago No. 23',
                'no_telp_handphone_ibu' => '083456789014',
                'email_ibu' => 'sri.handayani@gmail.com',
                'pendidikan_ibu_id' => 4,
                'pekerjaan_ibu_id' => 4,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Kompetisi Programming", "tingkat"=> "Nasional"],
                    ["prestasi"=> "Juara 3 Lomba Robotik", "tingkat"=> "Provinsi"]
                ]),
                'sumbangan_sukarela' => 500000,
                'status' => 1,
                'pilihan_1' => 3,
                'pilihan_2' => 1,
                'pilihan_3' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 2,
                'nik' => '3201045678901234',
                'nama_lengkap' => 'Dewi Sari',
                'tempat_lahir' => 'Cimahi',
                'tanggal_lahir' => '2006-09-23',
                'alamat_di_bandung' => 'Jl. Cibaduyut No. 12',
                'no_telp_handphone' => '084567890123',
                'kelurahan' => 'Cibaduyut',
                'kecamatan' => 'Bojongloa Kidul',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusuf.wicaksono@tarunabakti.or.id',
                'agama_id' => 2,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMK Negeri 1 Cimahi',
                'alamat_sekolah' => 'Jl. Kolonel Masturi No. 2, Cimahi',
                'golongan_darah_id' => 3,
                'nik_ayah' => '3201045678901235',
                'nama_ayah' => 'Heri Sugianto',
                'alamat_rumah_ayah' => 'Jl. Cibaduyut No. 12',
                'no_telp_handphone_ayah' => '084567890124',
                'email_ayah' => 'heri.sugianto@gmail.com',
                'pendidikan_ayah_id' => 1,
                'pekerjaan_ayah_id' => 5,
                'nik_ibu' => '3201045678901236',
                'nama_ibu' => 'Tuti Wulandari',
                'alamat_rumah_ibu' => 'Jl. Cibaduyut No. 12',
                'no_telp_handphone_ibu' => '084567890125',
                'email_ibu' => 'tuti.wulandari@gmail.com',
                'pendidikan_ibu_id' => 1,
                'pekerjaan_ibu_id' => 2,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Lomba Renang", "tingkat"=> "Kabupaten/Kota"]
                ]),
                'sumbangan_sukarela' => 1500000,
                'status' => 1,
                'pilihan_1' => 2,
                'pilihan_2' => 1,
                'pilihan_3' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201056789012345',
                'nama_lengkap' => 'Andi Wirawan',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2006-02-20',
                'alamat_di_bandung' => 'Jl. Sudirman No. 100',
                'no_telp_handphone' => '085678901234',
                'kelurahan' => 'Sudirman',
                'kecamatan' => 'Cicendo',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusuf.wicaksono@tarunabakti.or.id',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 1 Jakarta',
                'alamat_sekolah' => 'Jl. MH Thamrin No. 10, Jakarta',
                'golongan_darah_id' => 1,
                'nik_ayah' => '3201056789012346',
                'nama_ayah' => 'Suryo Wijaya',
                'alamat_rumah_ayah' => 'Jl. Sudirman No. 100',
                'no_telp_handphone_ayah' => '085678901235',
                'email_ayah' => 'suryo.wijaya@gmail.com',
                'pendidikan_ayah_id' => 5,
                'pekerjaan_ayah_id' => 1,
                'nik_ibu' => '3201056789012347',
                'nama_ibu' => 'Lina Harjanti',
                'alamat_rumah_ibu' => 'Jl. Sudirman No. 100',
                'no_telp_handphone_ibu' => '085678901236',
                'email_ibu' => 'lina.harjanti@gmail.com',
                'pendidikan_ibu_id' => 5,
                'pekerjaan_ibu_id' => 6,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 2 Lomba Tenis Meja", "tingkat"=> "Provinsi"],
                    ["prestasi"=> "Juara 1 Lomba Bulutangkis", "tingkat"=> "Kabupaten/Kota"]
                ]),
                'sumbangan_sukarela' => 1000000,
                'status' => 1,
                'pilihan_1' => 3,
                'pilihan_2' => 1,
                'pilihan_3' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201067890123456',
                'nama_lengkap' => 'Bambang Sugiarto',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2006-07-25',
                'alamat_di_bandung' => 'Jl. Cipaganti No. 12',
                'no_telp_handphone' => '086789012345',
                'kelurahan' => 'Cipaganti',
                'kecamatan' => 'Sukajadi',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusufbayu31@gmail.com',
                'agama_id' => 3,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 2 Yogyakarta',
                'alamat_sekolah' => 'Jl. Malioboro No. 5, Yogyakarta',
                'golongan_darah_id' => 3,
                'nik_ayah' => '3201067890123457',
                'nama_ayah' => 'Harsono Subroto',
                'alamat_rumah_ayah' => 'Jl. Cipaganti No. 12',
                'no_telp_handphone_ayah' => '086789012346',
                'email_ayah' => 'harsono.subroto@gmail.com',
                'pendidikan_ayah_id' => 4,
                'pekerjaan_ayah_id' => 3,
                'nik_ibu' => '3201067890123458',
                'nama_ibu' => 'Ratna Kurnia',
                'alamat_rumah_ibu' => 'Jl. Cipaganti No. 12',
                'no_telp_handphone_ibu' => '086789012347',
                'email_ibu' => 'ratna.kurnia@gmail.com',
                'pendidikan_ibu_id' => 4,
                'pekerjaan_ibu_id' => 2,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Olimpiade Komputer", "tingkat"=> "Nasional"],
                    ["prestasi"=> "Juara 3 Lomba Catur", "tingkat"=> "Kabupaten/Kota"],
                    ["prestasi"=> "Juara 2 Lomba Esai", "tingkat"=> "Provinsi"]
                ]),
                'sumbangan_sukarela' => 1000000,
                'status' => 1,
                'pilihan_1' => 1,
                'pilihan_2' => 2,
                'pilihan_3' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201078901234567',
                'nama_lengkap' => 'Citra Dewi',
                'tempat_lahir' => 'Cirebon',
                'tanggal_lahir' => '2006-11-10',
                'alamat_di_bandung' => 'Jl. Pahlawan No. 45',
                'no_telp_handphone' => '087890123456',
                'kelurahan' => 'Pahlawan',
                'kecamatan' => 'Cibeunying Kaler',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusufbayu31@gmail.com',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 4 Cirebon',
                'alamat_sekolah' => 'Jl. Kartini No. 12, Cirebon',
                'golongan_darah_id' => 2,
                'nik_ayah' => '3201078901234568',
                'nama_ayah' => 'Eko Prasetyo',
                'alamat_rumah_ayah' => 'Jl. Pahlawan No. 45',
                'no_telp_handphone_ayah' => '087890123457',
                'email_ayah' => 'eko.prasetyo@gmail.com',
                'pendidikan_ayah_id' => 5,
                'pekerjaan_ayah_id' => 6,
                'nik_ibu' => '3201078901234569',
                'nama_ibu' => 'Maya Sari',
                'alamat_rumah_ibu' => 'Jl. Pahlawan No. 45',
                'no_telp_handphone_ibu' => '087890123458',
                'email_ibu' => 'maya.sari@gmail.com',
                'pendidikan_ibu_id' => 5,
                'pekerjaan_ibu_id' => 1,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Lomba Fotografi", "tingkat"=> "Internasional"],
                    ["prestasi"=> "Juara 2 Lomba Melukis", "tingkat"=> "Nasional"]
                ]),
                'sumbangan_sukarela' => 500000,
                'status' => 1,
                'pilihan_1' => 2,
                'pilihan_2' => 3,
                'pilihan_3' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201089012345678',
                'nama_lengkap' => 'Doni Setiawan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-05-19',
                'alamat_di_bandung' => 'Jl. Buah Batu No. 9',
                'no_telp_handphone' => '088901234567',
                'kelurahan' => 'Buah Batu',
                'kecamatan' => 'Lengkong',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusufbayu31@gmail.com',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 5 Bandung',
                'alamat_sekolah' => 'Jl. Buah Batu No. 8, Bandung',
                'golongan_darah_id' => 4,
                'nik_ayah' => '3201089012345679',
                'nama_ayah' => 'Agus Setiawan',
                'alamat_rumah_ayah' => 'Jl. Buah Batu No. 9',
                'no_telp_handphone_ayah' => '088901234568',
                'email_ayah' => 'agus.setiawan@gmail.com',
                'pendidikan_ayah_id' => 4,
                'pekerjaan_ayah_id' => 7,
                'nik_ibu' => '3201089012345680',
                'nama_ibu' => 'Yanti Kusuma',
                'alamat_rumah_ibu' => 'Jl. Buah Batu No. 9',
                'no_telp_handphone_ibu' => '088901234569',
                'email_ibu' => 'yanti.kusuma@gmail.com',
                'pendidikan_ibu_id' => 4,
                'pekerjaan_ibu_id' => 2,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 3 Lomba Tari Tradisional", "tingkat"=> "Provinsi"],
                    ["prestasi"=> "Juara 1 Lomba Menyanyi", "tingkat"=> "Kabupaten/Kota"]
                ]),
                'sumbangan_sukarela' => 2000000,
                'status' => 1,
                'pilihan_1' => 3,
                'pilihan_2' => 1,
                'pilihan_3' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201090123456789',
                'nama_lengkap' => 'Eka Pratama',
                'tempat_lahir' => 'Cimahi',
                'tanggal_lahir' => '2006-03-28',
                'alamat_di_bandung' => 'Jl. Pasteur No. 7',
                'no_telp_handphone' => '089012345678',
                'kelurahan' => 'Pasteur',
                'kecamatan' => 'Cicendo',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusufbayu31@gmail.com',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 2 Cimahi',
                'alamat_sekolah' => 'Jl. Gatot Subroto No. 4, Cimahi',
                'golongan_darah_id' => 1,
                'nik_ayah' => '3201090123456790',
                'nama_ayah' => 'Budi Pratama',
                'alamat_rumah_ayah' => 'Jl. Pasteur No. 7',
                'no_telp_handphone_ayah' => '089012345679',
                'email_ayah' => 'budi.pratama@gmail.com',
                'pendidikan_ayah_id' => 3,
                'pekerjaan_ayah_id' => 4,
                'nik_ibu' => '3201090123456791',
                'nama_ibu' => 'Lina Pratama',
                'alamat_rumah_ibu' => 'Jl. Pasteur No. 7',
                'no_telp_handphone_ibu' => '089012345680',
                'email_ibu' => 'lina.pratama@gmail.com',
                'pendidikan_ibu_id' => 3,
                'pekerjaan_ibu_id' => 6,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Lomba Desain Grafis", "tingkat"=> "Nasional"],
                    ["prestasi"=> "Juara 2 Lomba Poster", "tingkat"=> "Provinsi"]
                ]),
                'sumbangan_sukarela' => 500000,
                'status' => 1,
                'pilihan_1' => 2,
                'pilihan_2' => 3,
                'pilihan_3' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gelombang_id' => 1,
                'nik' => '3201101234567890',
                'nama_lengkap' => 'Fitri Handayani',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2006-09-15',
                'alamat_di_bandung' => 'Jl. Merdeka No. 11',
                'no_telp_handphone' => '081234567890',
                'kelurahan' => 'Merdeka',
                'kecamatan' => 'Sumur Bandung',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'email' => 'yusufbayu31@gmail.com',
                'agama_id' => 1,
                'warga_negara' => 'Indonesia',
                'asal_sekolah' => 'SMA Negeri 3 Bogor',
                'alamat_sekolah' => 'Jl. Pajajaran No. 15, Bogor',
                'golongan_darah_id' => 3,
                'nik_ayah' => '3201101234567891',
                'nama_ayah' => 'Iwan Handayani',
                'alamat_rumah_ayah' => 'Jl. Merdeka No. 11',
                'no_telp_handphone_ayah' => '081234567891',
                'email_ayah' => 'iwan.handayani@gmail.com',
                'pendidikan_ayah_id' => 4,
                'pekerjaan_ayah_id' => 3,
                'nik_ibu' => '3201101234567892',
                'nama_ibu' => 'Sri Mulyani',
                'alamat_rumah_ibu' => 'Jl. Merdeka No. 11',
                'no_telp_handphone_ibu' => '081234567892',
                'email_ibu' => 'sri.mulyani@gmail.com',
                'pendidikan_ibu_id' => 4,
                'pekerjaan_ibu_id' => 2,
                'data_prestasi' => json_encode([
                    ["prestasi"=> "Juara 1 Lomba Pencak Silat", "tingkat"=> "Kabupaten/Kota"],
                    ["prestasi"=> "Juara 2 Lomba Karate", "tingkat"=> "Provinsi"],
                    ["prestasi"=> "Juara 3 Lomba Judo", "tingkat"=> "Nasional"]
                ]),
                'sumbangan_sukarela' => 1000000,
                'status' => 1,
                'pilihan_1' => 1,
                'pilihan_2' => 2,
                'pilihan_3' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}