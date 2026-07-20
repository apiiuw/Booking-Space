<?php

namespace App\Http\Controllers\User\PeminjamanRuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\PeminjamanRuangan;
use Carbon\Carbon;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        return view('user.pages.peminjaman-ruangan.index');
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
            // Karena di PeminjamanRuangan tipe_ruangan tersimpan dengan format judul (misal "Laboratorium Komputer")
            // kita asumsikan $room->type dan $room->name sudah cocok. (Catatan: harus dipastikan formatnya sama dengan DB saat di-query)
            // Di sistem ini biasanya $room->type adalah enum atau string. 
            // Cek cara konversi di DetailRuanganController. Kita asumsikan sama:
            // Format yang disimpan di tabel PeminjamanRuangan adalah gabungan dari Tipe + Identifier (Nomor Ruangan)
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

        // Kelompokkan hasil berdasarkan tipe ruangan agar rapi di UI
        $groupedRooms = collect($availableRooms)->groupBy('type');

        return view('user.pages.peminjaman-ruangan.search-result', [
            'tanggal' => $tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'groupedRooms' => $groupedRooms,
        ]);
    }
}
