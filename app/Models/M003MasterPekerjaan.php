<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M003MasterPekerjaan extends Model
{
    use HasFactory;

    // Relasi untuk pekerjaan ayah
    public function studentRegistrationsAsAyah()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pekerjaan_ayah_id');
    }

    // Relasi untuk pekerjaan ibu
    public function studentRegistrationsAsIbu()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pekerjaan_ibu_id');
    }
}
