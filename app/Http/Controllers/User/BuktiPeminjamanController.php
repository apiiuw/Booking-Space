<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanRuangan;
use Carbon\Carbon;

class BuktiPeminjamanController extends Controller
{
    public function index()
    {
        $this->autoUpdateStatus();
        $emailUser = Auth::user()->email;

        $peminjaman = PeminjamanRuangan::where('email', $emailUser)
            ->orderBy('tanggal_peminjaman', 'desc')
            ->get();

        return view('user.pages.user.bukti-peminjaman.index', compact('peminjaman'));
    }

    private function autoUpdateStatus()
    {
        $now = Carbon::now();
        $today = $now->toDateString();
        $timeNow = $now->format('H:i:s');

        // ===============================
        // TERJADWAL → SEDANG BERLANGSUNG
        // ===============================
        PeminjamanRuangan::where('status', 'Terjadwal')
            ->whereDate('tanggal_peminjaman', $today)
            ->where('waktu_mulai', '<=', $timeNow)
            ->where('waktu_selesai', '>=', $timeNow)
            ->update([
                'status' => 'Sedang Berlangsung'
            ]);

        // =====================================
        // SEDANG BERLANGSUNG → SELESAI
        // =====================================

        // 1️⃣ JIKA TANGGAL SUDAH LEWAT
        PeminjamanRuangan::where('status', 'Sedang Berlangsung')
            ->whereDate('tanggal_peminjaman', '<', $today)
            ->update([
                'status' => 'Selesai'
            ]);

        // 2️⃣ JIKA HARI INI TAPI JAM SUDAH LEWAT
        PeminjamanRuangan::where('status', 'Sedang Berlangsung')
            ->whereDate('tanggal_peminjaman', $today)
            ->where('waktu_selesai', '<', $timeNow)
            ->update([
                'status' => 'Selesai'
            ]);
    }
}
