<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\HousePhoto;
use App\Models\HouseFeature;

class House extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'houses';

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
        'deleted_at' => 'datetime',
    ];

    /**
     * Relasi ke model City (Satu rumah hanya ada di satu kota).
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Relasi ke model HousePhoto (Satu rumah bisa memiliki banyak foto).
     */
    public function photos(): HasMany
    {
        return $this->hasMany(HousePhoto::class, 'house_id');
    }

    /**
     * Relasi ke model HouseFeature (Satu rumah bisa memiliki banyak fitur).
     */
    public function features(): HasMany
    {
        return $this->hasMany(HouseFeature::class, 'house_id');
    }

    /**
     * Mutator untuk atribut 'name'.
     * Mengubah nilai 'name' menjadi huruf kapital di awal setiap kata sebelum disimpan.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
