<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PeminjamanRuangan;

class RoomAvailabilityController extends Controller
{
    public function index()
    {
        return view('admin.pages.room-availability.index');
    }

    public function showDetail($type)
    {
        $roomName = match ($type) {
            'rapat' => 'Ruang Rapat',
            'sidang' => 'Ruang Sidang',
            'lab-komputer' => 'Ruang Lab Komputer',
            'aula' => 'Ruang Aula',
            default => 'Ruangan Tidak Diketahui',
        };

        return view('admin.pages.room-availability.detail', compact('type', 'roomName'));
    }

    public function showRoom($type, $roomNumber)
    {
        $roomName = match ($type) {
            'rapat' => 'Ruang Rapat',
            'sidang' => 'Ruang Sidang',
            'lab-komputer' => 'Laboratorium Komputer',
            'aula' => 'Aula',
            default => 'Ruangan Tidak Diketahui',
        };

        $timezone = 'Asia/Jakarta';
        $month = request()->get('month', now()->month);
        $year  = request()->get('year', now()->year);

        // Ambil semua peminjaman ruangan ini dalam 1 bulan
        $peminjaman = PeminjamanRuangan::where('tipe_ruangan', $roomName)
            ->where('ruangan', $roomName . ' ' . $roomNumber)
            ->whereYear('tanggal_peminjaman', $year)
            ->whereMonth('tanggal_peminjaman', $month)
            ->get()
            ->groupBy(fn ($item) => Carbon::parse($item->tanggal_peminjaman)->format('Y-m-d'));

        return view(
            'admin.pages.room-availability.availability',
            compact('type', 'roomName', 'roomNumber', 'peminjaman')
        );
    }

    public function showDate($type, $roomNumber, $date)
    {
        $roomName = match ($type) {
            'rapat' => 'Ruang Rapat',
            'sidang' => 'Ruang Sidang',
            'lab-komputer' => 'Laboratorium Komputer',
            'aula' => 'Aula',
            default => 'Ruangan Tidak Diketahui',
        };

        $timezone = 'Asia/Jakarta';
        $selectedDate = Carbon::createFromFormat('d-m-Y', $date, $timezone);

        // JAM KERJA
        $dayStart = Carbon::createFromTime(7, 0, 0, $timezone);
        $dayEnd   = Carbon::createFromTime(17, 0, 0, $timezone);

        $bookings = PeminjamanRuangan::where('tipe_ruangan', $roomName)
            ->where('ruangan', $roomName . ' ' . $roomNumber)
            ->whereDate('tanggal_peminjaman', $selectedDate->format('Y-m-d'))
            ->orderBy('waktu_mulai')
            ->get();

        $timeline = [];
        $current = $dayStart->copy();

        foreach ($bookings as $booking) {
            $bookingStart = Carbon::parse($booking->waktu_mulai, $timezone);
            $bookingEnd   = Carbon::parse($booking->waktu_selesai, $timezone);

            // POTONG JIKA DI LUAR JAM KERJA
            if ($bookingStart < $dayStart) $bookingStart = $dayStart->copy();
            if ($bookingEnd > $dayEnd)     $bookingEnd   = $dayEnd->copy();

            // SLOT TERSEDIA SEBELUM BOOKING (MIN 1 JAM)
            if ($current->diffInMinutes($bookingStart, false) >= 60) {
                $timeline[] = [
                    'type' => 'available',
                    'start' => $current->format('H:i'),
                    'end' => $bookingStart->format('H:i'),
                    'duration' => $current->diffInMinutes($bookingStart),
                ];
            }

            // SLOT BOOKED (VALID)
            if ($bookingStart < $bookingEnd) {
                $timeline[] = [
                    'type' => 'booked',
                    'start' => $bookingStart->format('H:i'),
                    'end' => $bookingEnd->format('H:i'),
                    'data' => $booking,
                ];
            }

            $current = $bookingEnd->copy();
        }

        // SLOT TERSEDIA SETELAH BOOKING TERAKHIR
        if ($current->diffInMinutes($dayEnd, false) >= 60) {
            $timeline[] = [
                'type' => 'available',
                'start' => $current->format('H:i'),
                'end' => $dayEnd->format('H:i'),
                'duration' => $current->diffInMinutes($dayEnd),
            ];
        }

        return view(
            'admin.pages.room-availability.date-detail',
            compact('type', 'roomName', 'roomNumber', 'selectedDate', 'timeline')
        );
    }


}
