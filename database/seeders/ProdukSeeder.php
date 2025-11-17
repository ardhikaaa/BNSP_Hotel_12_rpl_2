<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        DB::table('produks')->insert([
            [
                'img' => 'produk/deluxe-room.jpg',
                'video' => 'https://www.youtube.com/embed/QDIPsdoOPEM',
                'room_type' => 'Deluxe Room',
                'price' => 1000000,
            ],
            [
                'img' => 'produk/standard-room.jpg',
                'video' => 'https://www.youtube.com/embed/dpl9q-yd7nU',
                'room_type' => 'Family Room',
                'price' => 750000,
            ],
            [
                'img' => 'produk/family-room.jpg',
                'video' => 'https://www.youtube.com/embed/NwrVsCQtKqQ',
                'room_type' => 'Standard Room',
                'price' => 500000,
            ],
        ]);
    }
}
