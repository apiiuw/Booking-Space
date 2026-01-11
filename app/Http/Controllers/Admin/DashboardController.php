<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanRuangan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // CARD JUMLAH PEMINJAMAN
        $belumDiproses = PeminjamanRuangan::where('status', 'Belum Diproses')->count();
        $terjadwal = PeminjamanRuangan::where('status', 'Terjadwal')->count();
        $sedangBerlangsung = PeminjamanRuangan::where('status', 'Sedang Berlangsung')->count();
        $selesai = PeminjamanRuangan::where('status', 'Selesai')->count();

        // RUANGAN FAVORIT (1 BULAN TERAKHIR)
        $ruanganFavorit = PeminjamanRuangan::where('tanggal_peminjaman', '>=', Carbon::now()->subMonth())
            ->selectRaw('ruangan, COUNT(*) as total')
            ->groupBy('ruangan')
            ->orderByDesc('total')
            ->first();

        // DATA GRAFIK STATUS
        $chartData = [
            'belum' => $belumDiproses,
            'terjadwal' => $terjadwal,
            'berlangsung' => $sedangBerlangsung,
            'selesai' => $selesai
        ];

        return view('admin.pages.dashboard.index', compact(
            'belumDiproses',
            'terjadwal',
            'selesai',
            'sedangBerlangsung',
            'ruanganFavorit',
            'chartData'
        ));
    }
}
