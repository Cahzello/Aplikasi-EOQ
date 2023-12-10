<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bahan_baku',
        'total_penggunaan_tahunan',
        'biaya_pemesanan',
        'biaya_penyimpanan',
        'max_penggunaan_tahunan',
        'average_penggunaan_tahunan'
    ];
}
