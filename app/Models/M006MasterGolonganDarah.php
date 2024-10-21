<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class M006MasterGolonganDarah extends Model
{
    use HasFactory;

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'golongan_darah_id');
    }
}
