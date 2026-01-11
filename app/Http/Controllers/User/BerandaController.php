<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use Carbon\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        $this->autoUpdateStatus();
        return view('user.pages.beranda.index');
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
