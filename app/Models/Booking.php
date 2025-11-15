<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'nama',
        'jk',
        'identitas',
        'produk_id',
        'price',
        'date',
        'duration',
        'breakfast',
        'total',
    ];

     public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}