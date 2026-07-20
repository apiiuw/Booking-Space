<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PeminjamanRuangan;
use App\Models\Room;

class RoomAvailabilityController extends Controller
{
    public function index()
    {
        return view('admin.pages.room-availability.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        $tanggal = Carbon::parse($request->tanggal);
        $waktuMulai = Carbon::parse($request->waktu_mulai);
        $waktuSelesai = Carbon::parse($request->waktu_selesai);

        // Validasi operasional
        $jamBuka = Carbon::createFromTime(7, 0);
        $jamTutup = Carbon::createFromTime(17, 0);
        if ($waktuMulai->lt($jamBuka) || $waktuSelesai->gt($jamTutup)) {
            return back()->withErrors(['waktu_mulai' => 'Pencarian hanya untuk jam operasional (07:00 - 17:00).'])->withInput();
        }

        if ($waktuMulai->diffInMinutes($waktuSelesai) < 60) {
             return back()->withErrors(['waktu_mulai' => 'Minimal peminjaman 1 jam.'])->withInput();
        }

        // Cari semua ruangan yang aktif
        $rooms = Room::where('is_active', 1)->get();
        
        $availableRooms = [];

        foreach ($rooms as $room) {
            $tipeDb = ucwords(str_replace('-', ' ', $room->url));
            $nameParts = explode(' ', $room->name);
            $roomIdentifier = end($nameParts);
            $ruanganDb = $tipeDb . ' ' . $roomIdentifier;
            
            $bentrok = PeminjamanRuangan::whereDate('tanggal_peminjaman', $request->tanggal)
                ->where('tipe_ruangan', $tipeDb)
                ->where('ruangan', $ruanganDb)
                ->where('status', '!=', 'Ditolak')
                ->where(function ($q) use ($request) {
                    $q->where('waktu_mulai', '<', $request->waktu_selesai)
                      ->where('waktu_selesai', '>', $request->waktu_mulai);
                })
                ->exists();

            if (!$bentrok) {
                $availableRooms[] = $room;
            }
        }

        $groupedRooms = collect($availableRooms)->groupBy('type');

        return view('admin.pages.room-availability.search-result', [
            'tanggal' => $tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'groupedRooms' => $groupedRooms,
        ]);
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
            'lab-komputer' => 'Ruang Lab Komputer',
            'aula' => 'Ruang Aula',
            default => 'Ruangan Tidak Diketahui',
        };

        $dbTipe = match ($type) {
            'rapat' => 'Rapat',
            'sidang' => 'Sidang',
            'lab-komputer' => 'Laboratorium Komputer',
            'aula' => 'Aula',
            default => $type,
        };

        $dbRuangan = $dbTipe . ' ' . $roomNumber;

        $timezone = 'Asia/Jakarta';
        $month = request()->get('month', now()->month);
        $year  = request()->get('year', now()->year);

        // Ambil semua peminjaman ruangan ini dalam 1 bulan
        $peminjaman = PeminjamanRuangan::where('tipe_ruangan', $dbTipe)
            ->where('ruangan', $dbRuangan)
            ->whereIn('status', ['Belum Diproses', 'Terjadwal', 'Sedang Berlangsung', 'Selesai'])
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
            'lab-komputer' => 'Ruang Lab Komputer',
            'aula' => 'Ruang Aula',
            default => 'Ruangan Tidak Diketahui',
        };

        $dbTipe = match ($type) {
            'rapat' => 'Rapat',
            'sidang' => 'Sidang',
            'lab-komputer' => 'Laboratorium Komputer',
            'aula' => 'Aula',
            default => $type,
        };

        $dbRuangan = $dbTipe . ' ' . $roomNumber;

        $timezone = 'Asia/Jakarta';
        $selectedDate = Carbon::createFromFormat('d-m-Y', $date, $timezone);

        // JAM KERJA
        $dayStart = Carbon::createFromTime(7, 0, 0, $timezone);
        $dayEnd   = Carbon::createFromTime(17, 0, 0, $timezone);

        $bookings = PeminjamanRuangan::where('tipe_ruangan', $dbTipe)
            ->where('ruangan', $dbRuangan)
            ->whereDate('tanggal_peminjaman', $selectedDate->format('Y-m-d'))
            ->whereIn('status', ['Belum Diproses', 'Terjadwal', 'Sedang Berlangsung', 'Selesai'])
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
