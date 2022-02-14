<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'tanggal_transaksi',
        'customer',
        'item',
        'qty',
        'total_diskon',
        'total_harga',
        'total_bayar',
    ];
}
