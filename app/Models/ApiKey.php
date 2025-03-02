<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApiKey extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'api_keys'; // Nama tabel yang digunakan

    protected $fillable = [
        'name',
        'key',
    ];

    protected $dates = ['deleted_at']; // Untuk soft delete
}
