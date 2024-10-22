<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class M008StudentRegistration extends Model
{
    protected $casts = [
        'data_prestasi' => 'json',
    ];

    use HasFactory;

    // Define relationships

    public function gelombang(): BelongsTo
    {
        return $this->belongsTo(M001MasterGelombang::class, 'gelombang_id');
    }

    public function agama(): BelongsTo
    {
        return $this->belongsTo(M005MasterAgama::class, 'agama_id');
    }

    public function golonganDarah(): BelongsTo
    {
        return $this->belongsTo(M006MasterGolonganDarah::class, 'golongan_darah_id');
    }

    public function pendidikanAyah(): BelongsTo
    {
        return $this->belongsTo(M002MasterPendidikan::class, 'pendidikan_ayah_id');
    }

    public function pekerjaanAyah(): BelongsTo
    {
        return $this->belongsTo(M003MasterPekerjaan::class, 'pekerjaan_ayah_id');
    }

    public function pendidikanIbu(): BelongsTo
    {
        return $this->belongsTo(M002MasterPendidikan::class, 'pendidikan_ibu_id');
    }

    public function pekerjaanIbu(): BelongsTo
    {
        return $this->belongsTo(M003MasterPekerjaan::class, 'pekerjaan_ibu_id');
    }

    public function virtualAccount(): BelongsTo
    {
        return $this->belongsTo(M007VirtualAccount::class, 'virtual_account_id');
    }

    public function pilihan1(): BelongsTo
    {
        return $this->belongsTo(M004MasterJurusan::class, 'pilihan_1');
    }

    public function pilihan2(): BelongsTo
    {
        return $this->belongsTo(M004MasterJurusan::class, 'pilihan_2');
    }

    public function pilihan3(): BelongsTo
    {
        return $this->belongsTo(M004MasterJurusan::class, 'pilihan_3');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'pendaftar_id');
    }
}
