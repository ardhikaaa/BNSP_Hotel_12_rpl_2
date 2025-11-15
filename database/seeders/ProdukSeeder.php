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
                'video' => 'https://www.youtube.com/embed/NwrVsCQtKqQ',
                'room_type' => 'Deluxe Room',
                'price' => 500000,
            ],
            [
                'img' => 'produk/standard-room.jpg',
                'video' => 'https://www.youtube.com/embed/NwrVsCQtKqQ',
                'room_type' => 'Standard Room',
                'price' => 350000,
            ],
            [
                'img' => 'produk/family-room.jpg',
                'video' => 'https://www.youtube.com/embed/NwrVsCQtKqQ',
                'room_type' => 'Family Room',
                'price' => 250000,
            ],
        ]);
    }
}
