<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'nama',
        'contact',
        'email',
        'alamat',
        'diskon',
        'tipe_diskon',
        'ktp',
    ];
}
