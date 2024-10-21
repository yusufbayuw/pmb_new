<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M004MasterJurusan extends Model
{
    use HasFactory;

    // Relasi untuk pilihan 1
    public function studentRegistrationsAsFirstChoice()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pilihan_1');
    }

    // Relasi untuk pilihan 2
    public function studentRegistrationsAsSecondChoice()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pilihan_2');
    }

    // Relasi untuk pilihan 3
    public function studentRegistrationsAsThirdChoice()
    {
        return $this->hasMany(M008StudentRegistration::class, 'pilihan_3');
    }
}
