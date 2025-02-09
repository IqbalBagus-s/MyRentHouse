<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_transactions';

    protected $fillable = [
        'name',
        'phone_number',
        'booking_trx',
        'total_amount',
        'duration',
        'started_at',
        'ended_at',
        'is_paid',
        'house_id',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
