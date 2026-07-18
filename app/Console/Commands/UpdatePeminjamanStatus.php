<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdatePeminjamanStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-peminjaman-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = \Carbon\Carbon::now();
        $today = $now->toDateString();
        $timeNow = $now->format('H:i:s');

        // ===============================
        // TERJADWAL → SEDANG BERLANGSUNG
        // ===============================
        $updatedBerlangsung = \App\Models\PeminjamanRuangan::where('status', 'Terjadwal')
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
        $updatedSelesai1 = \App\Models\PeminjamanRuangan::whereIn('status', ['Terjadwal', 'Sedang Berlangsung'])
            ->whereDate('tanggal_peminjaman', '<', $today)
            ->update([
                'status' => 'Selesai'
            ]);

        // 2️⃣ JIKA HARI INI TAPI JAM SUDAH LEWAT
        $updatedSelesai2 = \App\Models\PeminjamanRuangan::whereIn('status', ['Terjadwal', 'Sedang Berlangsung'])
            ->whereDate('tanggal_peminjaman', $today)
            ->where('waktu_selesai', '<', $timeNow)
            ->update([
                'status' => 'Selesai'
            ]);

        $this->info("Updated to Sedang Berlangsung: $updatedBerlangsung");
        $this->info("Updated to Selesai (Past Date): $updatedSelesai1");
        $this->info("Updated to Selesai (Past Time): $updatedSelesai2");
    }
}
