<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class M007VirtualAccount extends Model
{
    use HasFactory;

    // Define Relationship

    public function gelombang(): BelongsTo
    {
        return $this->belongsTo(M001MasterGelombang::class, 'gelombang_id');
    }

    public function pendaftar(): HasOne
    {
        return $this->hasOne(M008StudentRegistration::class, 'virtual_account_id');
    }
}
