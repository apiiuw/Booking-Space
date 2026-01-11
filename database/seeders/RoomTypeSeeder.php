<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use Illuminate\Support\Str;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        $roomTypes = [
            [
                'type'  => 'Ruang Rapat',
                'image' => 'assets/images/room-types/rapat.png',
            ],
            [
                'type'  => 'Ruang Kelas',
                'image' => 'assets/images/room-types/kelas.png',
            ],
            [
                'type'  => 'Ruang Auditorium',
                'image' => 'assets/images/room-types/auditorium.png',
            ],
        ];

        foreach ($roomTypes as $item) {
            RoomType::create([
                'type'  => $item['type'],
                'url'   => Str::slug($item['type']),
                'image' => $item['image'],
            ]);
        }
    }
}

