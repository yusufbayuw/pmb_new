<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M002MasterPendidikan extends Model
{
    use HasFactory;

    // Relasi untuk pendidikan ayah
    public function studentRegistrationsAsAyah()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pendidikan_ayah_id');
    }

    // Relasi untuk pendidikan ibu
    public function studentRegistrationsAsIbu()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pendidikan_ibu_id');
    }

}
