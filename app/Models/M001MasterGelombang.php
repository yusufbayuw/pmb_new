<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M001MasterGelombang extends Model
{
    use HasFactory;

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'gelombang_id');
    }
}
