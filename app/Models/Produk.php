<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'img',
        'video',
        'room_type',
        'price'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}