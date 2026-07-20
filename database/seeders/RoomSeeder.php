<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        Room::truncate();

        $rooms = [
            // ================= RUANG RAPAT =================
            [
                'url' => 'rapat',
                'type' => 'Rapat',
                'name' => 'Ruang Rapat 101',
                'capacity' => 10,
                'facilities' => 'Proyektor, AC, Meja Rapat, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Ruang rapat kecil berkapasitas 8-10 orang, cocok untuk rapat dosen.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'rapat',
                'type' => 'Rapat',
                'name' => 'Ruang Rapat 102',
                'capacity' => 20,
                'facilities' => 'AC, Meja, Kursi, Wi-Fi, Papan Tulis',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Ruang rapat berukuran sedang untuk pertemuan internal.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'rapat',
                'type' => 'Rapat',
                'name' => 'Ruang Rapat 103',
                'capacity' => 15,
                'facilities' => 'AC, Meja, Kursi, Proyektor',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Memiliki pencahayaan alami dan tata letak fleksibel.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'rapat',
                'type' => 'Rapat',
                'name' => 'Ruang Rapat 104',
                'capacity' => 30,
                'facilities' => 'Sistem Audio, Proyektor, AC, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Ruang rapat besar berkapasitas hingga 30 orang.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],

            // ================= LAB KOMPUTER =================
            [
                'url' => 'laboratorium-komputer',
                'type' => 'Laboratorium Komputer',
                'name' => 'Lab Komputer 101',
                'capacity' => 40,
                'facilities' => 'Komputer, AC, Proyektor, Internet Cepat',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Laboratorium komputer untuk praktikum dan pelatihan software.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'laboratorium-komputer',
                'type' => 'Laboratorium Komputer',
                'name' => 'Lab Komputer 102',
                'capacity' => 40,
                'facilities' => 'Komputer, AC, Proyektor, Internet Cepat',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Laboratorium komputer untuk praktikum dan ujian.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'laboratorium-komputer',
                'type' => 'Laboratorium Komputer',
                'name' => 'Lab Komputer 103',
                'capacity' => 40,
                'facilities' => 'Komputer, AC, Proyektor, Internet Cepat',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Laboratorium komputer dengan spesifikasi tinggi.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'laboratorium-komputer',
                'type' => 'Laboratorium Komputer',
                'name' => 'Lab Komputer 104',
                'capacity' => 40,
                'facilities' => 'Komputer, AC, Proyektor, Internet Cepat',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Laboratorium komputer untuk desain dan render.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],

            // ================= RUANG SIDANG =================
            [
                'url' => 'sidang',
                'type' => 'Sidang',
                'name' => 'Ruang Sidang 101',
                'capacity' => 30,
                'facilities' => 'Sound System, AC, Meja Sidang, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Digunakan untuk sidang resmi dan ujian tugas akhir.',
                'image' => 'img/carousel/carousel-3.jpeg',
            ],
            [
                'url' => 'sidang',
                'type' => 'Sidang',
                'name' => 'Ruang Sidang 102',
                'capacity' => 30,
                'facilities' => 'Sound System, AC, Meja Sidang, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Digunakan untuk sidang resmi dan ujian tesis.',
                'image' => 'img/carousel/carousel-3.jpeg',
            ],
            [
                'url' => 'sidang',
                'type' => 'Sidang',
                'name' => 'Ruang Sidang 103',
                'capacity' => 30,
                'facilities' => 'Sound System, AC, Meja Sidang, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Digunakan untuk sidang proposal.',
                'image' => 'img/carousel/carousel-3.jpeg',
            ],
            [
                'url' => 'sidang',
                'type' => 'Sidang',
                'name' => 'Ruang Sidang 104',
                'capacity' => 40,
                'facilities' => 'Sound System, AC, Meja Sidang, Kursi',
                'borrow_days' => 'Senin s/d Jumat',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '17:00',
                'description' => 'Digunakan untuk sidang tertutup.',
                'image' => 'img/carousel/carousel-3.jpeg',
            ],

            // ================= AULA =================
            [
                'url' => 'aula',
                'type' => 'Aula',
                'name' => 'Ruang Aula 101',
                'capacity' => 150,
                'facilities' => 'Panggung, Sound System, AC, Kursi',
                'borrow_days' => 'Senin s/d Sabtu',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '20:00',
                'description' => 'Aula untuk seminar, acara besar, dan kegiatan institusi.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'aula',
                'type' => 'Aula',
                'name' => 'Ruang Aula 102',
                'capacity' => 100,
                'facilities' => 'Sound System, AC, Kursi',
                'borrow_days' => 'Senin s/d Sabtu',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '20:00',
                'description' => 'Aula untuk acara pameran mahasiswa.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'aula',
                'type' => 'Aula',
                'name' => 'Ruang Aula 103',
                'capacity' => 100,
                'facilities' => 'Sound System, AC, Kursi',
                'borrow_days' => 'Senin s/d Sabtu',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '20:00',
                'description' => 'Aula multifungsi.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
            [
                'url' => 'aula',
                'type' => 'Aula',
                'name' => 'Ruang Aula 104',
                'capacity' => 200,
                'facilities' => 'Panggung Besar, Sound System, AC, Kursi',
                'borrow_days' => 'Senin s/d Sabtu',
                'borrow_time_start' => '08:00',
                'borrow_time_end' => '20:00',
                'description' => 'Aula utama fakultas.',
                'image' => 'img/carousel/carousel-2.jpeg',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}