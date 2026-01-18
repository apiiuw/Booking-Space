<?php

namespace App\Http\Controllers\User\PeminjamanRuangan;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanRuangan;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class DetailRuanganController extends Controller
{
    public function index(string $tipe, string $ruangan, Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $now = Carbon::now($timezone);

        $currentMonth = (int) $request->get('month', $now->month);
        $currentYear  = (int) $request->get('year', $now->year);

        // Bulan aktif
        $displayedMonth = Carbon::create(
            $currentYear,
            $currentMonth,
            1,
            0,
            0,
            0,
            $timezone
        );

        $prevMonth = $displayedMonth->copy()->subMonth();
        $nextMonth = $displayedMonth->copy()->addMonth();

        $startOfMonth   = $displayedMonth->copy()->startOfMonth();
        $daysInMonth    = $displayedMonth->daysInMonth;
        $firstDayOfWeek = $startOfMonth->dayOfWeek; // 0 = Minggu

        // ===============================
        // DATA PEMINJAMAN REAL
        // ===============================
        $peminjaman = PeminjamanRuangan::where('tipe_ruangan', ucwords(str_replace('-', ' ', $tipe)))
            ->where('ruangan', ucwords(str_replace('-', ' ', $tipe)) . ' ' . $ruangan)
            ->whereBetween('tanggal_peminjaman', [
                $startOfMonth->toDateString(),
                $displayedMonth->copy()->endOfMonth()->toDateString()
            ])
            ->whereIn('status', ['Belum Diproses', 'Terjadwal', 'Sedang Berlangsung', 'Selesai'])
            ->get()
            ->groupBy('tanggal_peminjaman');

        // ===============================
        // TANGGAL MERAH (COLLECTION)
        // ===============================
        $tanggalMerah = collect([
            Carbon::create($currentYear, 1, 1),
            Carbon::create($currentYear, 8, 17),
            Carbon::create($currentYear, 12, 25),
        ]);

        return view('user.pages.peminjaman-ruangan.detail-ruangan.index', compact(
            'tipe',
            'ruangan',
            'timezone',
            'currentMonth',
            'currentYear',
            'displayedMonth',
            'prevMonth',
            'nextMonth',
            'firstDayOfWeek',
            'daysInMonth',
            'peminjaman',
            'tanggalMerah'
        ));
    }
}
