<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\PeminjamanRuangan;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    public function index(Request $request)
    {
        $this->autoUpdateStatus();

        $query = PeminjamanRuangan::query();
        // ⛔ KECUALIKAN STATUS SELESAI
        $query = PeminjamanRuangan::where('status', '!=', 'Selesai');

        // 🔍 Search Nama / Instansi
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_penanggung_jawab', 'like', '%' . $request->search . '%')
                  ->orWhere('instansi', 'like', '%' . $request->search . '%');
            });
        }

        // 📅 Filter Tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_peminjaman', $request->tanggal);
        }

        // ⏰ Filter Waktu
        if ($request->filled('waktu_mulai')) {
            $query->where('waktu_mulai', '>=', $request->waktu_mulai);
        }

        if ($request->filled('waktu_selesai')) {
            $query->where('waktu_selesai', '<=', $request->waktu_selesai);
        }

        // 🏢 Filter Tipe Ruangan
        if ($request->filled('tipe_ruangan')) {
            $query->where('tipe_ruangan', $request->tipe_ruangan);
        }

        // 🚦 Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $peminjaman = $query
            ->orderBy('tanggal_peminjaman', 'desc')
            ->get();

        return view('admin.pages.loan-request.index', compact('peminjaman'));
    }

    public function approve(Request $request)
    {
        $peminjaman = PeminjamanRuangan::findOrFail($request->id);

        if ($peminjaman->status !== 'Belum Diproses') {
            return redirect()
                ->route('loan.request.index')
                ->with('error', 'Peminjaman sudah diproses sebelumnya.');
        }

        // ================= UPLOAD DOCUMENT ADMIN =================
        $documentAdminPath = null;
        if ($request->hasFile('document_admin')) {
            $request->validate(['document_admin' => 'required|file|mimes:pdf|max:5120']);
            $file = $request->file('document_admin');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $documentAdminPath = $file->storeAs('public/documents/admin', $fileName);
        }

        $peminjaman->update([
            'status' => 'Terjadwal',
            'document_admin' => $documentAdminPath,
        ]);

        return redirect()
            ->route('loan.request.index')
            ->with('success', 'Peminjaman berhasil disetujui dan dijadwalkan.');
    }

    public function reject(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:peminjaman_ruangan,id',
        ]);

        $peminjaman = PeminjamanRuangan::findOrFail($request->id);

        // Cegah tolak jika sudah diproses
        if ($peminjaman->status !== 'Belum Diproses') {
            return redirect()
                ->route('loan.request.index')
                ->with('error', 'Peminjaman sudah diproses sebelumnya.');
        }

        // ================= UPLOAD DOCUMENT ADMIN =================
        $documentAdminPath = null;
        if ($request->hasFile('document_admin')) {
            $request->validate(['document_admin' => 'required|file|mimes:pdf|max:5120']);
            $file = $request->file('document_admin');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $documentAdminPath = $file->storeAs('public/documents/admin', $fileName);
        }

        $peminjaman->update([
            'status' => 'Ditolak',
            'document_admin' => $documentAdminPath,
        ]);

        return redirect()
            ->route('loan.request.index')
            ->with('success', 'Peminjaman berhasil ditolak.');
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
        PeminjamanRuangan::whereIn('status', ['Terjadwal', 'Sedang Berlangsung'])
            ->whereDate('tanggal_peminjaman', '<', $today)
            ->update([
                'status' => 'Selesai'
            ]);

        // 2️⃣ JIKA HARI INI TAPI JAM SUDAH LEWAT
        PeminjamanRuangan::whereIn('status', ['Terjadwal', 'Sedang Berlangsung'])
            ->whereDate('tanggal_peminjaman', $today)
            ->where('waktu_selesai', '<', $timeNow)
            ->update([
                'status' => 'Selesai'
            ]);
    }


}
