<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'photo',
        'boolean',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'boolean' => 'boolean',
    ];

    /**
     * Relasi ke model House (Satu kota bisa memiliki banyak rumah).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function houses()
    {
        return $this->hasMany(House::class);
    }

    /**
     * Mutator untuk kolom 'name'.
     * Mengubah nilai 'name' menjadi huruf kapital di awal setiap kata dan menghasilkan 'slug'.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value)); // Format nama
        $this->attributes['slug'] = Str::slug($value); // Generate slug dari nama
    }

    /**
     * Accessor untuk kolom 'photo'.
     * Mengembalikan URL lengkap untuk foto dengan pengecekan null.
     *
     * @param string|null $value
     * @return string|null
     */
    public function getPhotoAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return $value ? asset('storage/' . $value) : null;
    }
}