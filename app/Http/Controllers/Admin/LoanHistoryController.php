<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanRuangan;
use Illuminate\Http\Request;

class LoanHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = PeminjamanRuangan::where('status', 'Selesai');

        // Search Nama / Instansi
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_penanggung_jawab', 'like', '%' . $request->search . '%')
                  ->orWhere('instansi', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_peminjaman', $request->tanggal);
        }

        // Filter Waktu
        if ($request->filled('waktu_mulai')) {
            $query->where('waktu_mulai', '>=', $request->waktu_mulai);
        }

        if ($request->filled('waktu_selesai')) {
            $query->where('waktu_selesai', '<=', $request->waktu_selesai);
        }

        // Filter Tipe Ruangan
        if ($request->filled('tipe_ruangan')) {
            $query->where('tipe_ruangan', $request->tipe_ruangan);
        }

        $riwayat = $query
            ->orderBy('tanggal_peminjaman', 'desc')
            ->get();

        return view('admin.pages.loan-history.index', compact('riwayat'));
    }
}
