<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'houses'; // Nama tabel

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'city_id',
        'is_available',
        'is_fully_booked',
        'price',
        'duration',
        'address',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'is_fully_booked' => 'boolean',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relasi ke model City (Satu rumah hanya ada di satu kota).
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Mutator untuk atribut 'name'.
     * Mengubah nilai 'name' menjadi huruf kapital di awal setiap kata sebelum disimpan.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
}