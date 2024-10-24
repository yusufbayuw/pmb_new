<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m008_student_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gelombang_id')->nullable()->constrained('m001_master_gelombangs')->cascadeOnDelete();
            $table->string('nomor_daftar')->nullable();
            $table->string('nomor_peserta')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat_di_bandung')->nullable();
            $table->string('no_telp_handphone')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('agama_id')->nullable()->constrained('m005_master_agamas')->nullOnDelete();
            $table->string('warga_negara')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->foreignId('golongan_darah_id')->nullable()->constrained('m006_master_golongan_darahs')->nullOnDelete();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('alamat_rumah_ayah')->nullable();
            $table->string('no_telp_handphone_ayah')->nullable();
            $table->string('email_ayah')->nullable();
            $table->foreignId('pendidikan_ayah_id')->nullable()->constrained('m002_master_pendidikans')->nullOnDelete();
            $table->foreignId('pekerjaan_ayah_id')->nullable()->constrained('m003_master_pekerjaans')->nullOnDelete();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat_rumah_ibu')->nullable();
            $table->string('no_telp_handphone_ibu')->nullable();
            $table->string('email_ibu')->nullable();
            $table->foreignId('pendidikan_ibu_id')->nullable()->constrained('m002_master_pendidikans')->nullOnDelete();
            $table->foreignId('pekerjaan_ibu_id')->nullable()->constrained('m003_master_pekerjaans')->nullOnDelete();
            $table->json('data_prestasi')->nullable();
            $table->decimal('sumbangan_sukarela',12,2)->nullable();
            $table->integer('verifikasi')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(1);
            $table->string('berkas_pembayaran')->nullable();
            $table->foreignId('virtual_account_id')->nullable()->constrained('m007_virtual_accounts')->nullOnDelete();
            $table->foreignId('pilihan_1')->nullable()->constrained('m004_master_jurusans')->nullOnDelete();
            $table->foreignId('pilihan_2')->nullable()->constrained('m004_master_jurusans')->nullOnDelete();
            $table->foreignId('pilihan_3')->nullable()->constrained('m004_master_jurusans')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m008_student_registrations');
    }
};
