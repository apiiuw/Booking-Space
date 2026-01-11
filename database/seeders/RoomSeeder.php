<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [

            // ================= RUANG RAPAT =================
            [
                'url' => 'rapat',
                'type' => 'Rapat',
                'name' => 'Ruang Rapat 1',
                'capacity' => 30,
                'facilities' => 'Proyektor, AC, Meja, Kursi, Whiteboard',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Ruang rapat untuk rapat harian, koordinasi, dan diskusi tim.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'rapat',
                'type' => 'Rapat',
                'name' => 'Ruang Rapat 2',
                'capacity' => 20,
                'facilities' => 'AC, Meja, Kursi, TV LED',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '16:00',
                'description' => 'Ruang rapat berukuran sedang untuk meeting internal.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],

            // ================= LAB KOMPUTER =================
            [
                'url' => 'lab-komputer',
                'type' => 'Laboratorium Komputer',
                'name' => 'Lab Komputer 1',
                'capacity' => 40,
                'facilities' => 'Komputer, AC, Proyektor, Internet',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Laboratorium komputer untuk pelatihan dan ujian.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],

            // ================= RUANG SIDANG =================
            [
                'url' => 'ruang-sidang',
                'type' => 'Ruang Sidang',
                'name' => 'Ruang Sidang Utama',
                'capacity' => 50,
                'facilities' => 'Sound System, AC, Meja Sidang, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Digunakan untuk sidang resmi dan rapat besar.',
                'image' => 'img/carousel/carousel-3.jpeg',
            ],

            // ================= AULA =================
            [
                'url' => 'ruang-aula',
                'type' => 'Ruang Aula',
                'name' => 'Aula Serbaguna',
                'capacity' => 150,
                'facilities' => 'Panggung, Sound System, AC, Kursi',
                'borrow_days' => 'Senin s/d Sabtu',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '20:00',
                'description' => 'Aula untuk seminar, acara besar, dan kegiatan institusi.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}