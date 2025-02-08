<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousePhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'house_photos';

    protected $fillable = [
        'photo',
        'house_id',
    ];

    /**
     * Relasi ke model House (Setiap foto hanya dimiliki oleh satu rumah).
     */
    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class, 'house_id');
    }
}
