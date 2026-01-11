<?php

namespace App\Http\Controllers\User\PeminjamanRuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PeminjamanRuangan;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Mail\BuktiPeminjamanMail;
use Illuminate\Support\Facades\Mail;

class PengajuanPeminjamanController extends Controller
{
    public function index($tipe, $ruangan, $tanggal)
    {
        // Validasi format tanggal dari URL
        try {
            $tanggalDipilih = Carbon::createFromFormat('d-m-Y', $tanggal);
        } catch (\Exception $e) {
            abort(404);
        }

        // Konversi slug URL → format database
        // contoh: laboratorium-komputer → Laboratorium Komputer
        $tipeDb = ucwords(str_replace('-', ' ', $tipe));

        // contoh: Laboratorium Komputer + 102
        $ruanganDb = $tipeDb . ' ' . $ruangan;

        // Ambil jadwal peminjaman di tanggal & ruangan tersebut
        $jadwalPeminjaman = PeminjamanRuangan::whereDate('tanggal_peminjaman', $tanggalDipilih->format('Y-m-d'))
            ->where('tipe_ruangan', $tipeDb)
            ->where('ruangan', $ruanganDb)
            ->orderBy('waktu_mulai')
            ->get();

        return view('user.pages.peminjaman-ruangan.pengajuan-peminjaman.index', [
            'tanggal' => $tanggalDipilih,
            'tipe' => $tipe,
            'ruangan' => $ruangan,
            'jadwalPeminjaman' => $jadwalPeminjaman,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penanggung_jawab' => 'required|string|max:255',
            'nik_penanggung_jawab' => 'required|string|max:50',
            'instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tipe_ruangan' => 'required|string',
            'ruangan' => 'required|string',
            'tanggal_peminjaman' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'keperluan' => 'required|string',
        ]);

        // 🔴 CEK BENTROK JAM
        $bentrok = PeminjamanRuangan::whereDate('tanggal_peminjaman', $validated['tanggal_peminjaman'])
            ->where('tipe_ruangan', $validated['tipe_ruangan'])
            ->where('ruangan', $validated['ruangan'])
            ->where(function ($q) use ($validated) {
                $q->where('waktu_mulai', '<', $validated['waktu_selesai'])
                ->where('waktu_selesai', '>', $validated['waktu_mulai']);
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withErrors([
                    'waktu_mulai' => 'Jam yang dipilih sudah terpakai. Silakan pilih jam lain.'
                ])
                ->withInput();
        }

        // ================= SIMPAN PEMINJAMAN =================
        $peminjaman = PeminjamanRuangan::create([
            'user_id' => Auth::id(),
            'email' => Auth::user()->email,
            'nama_penanggung_jawab' => $validated['nama_penanggung_jawab'],
            'nik_penanggung_jawab' => $validated['nik_penanggung_jawab'],
            'instansi' => $validated['instansi'],
            'jabatan' => $validated['jabatan'],
            'tipe_ruangan' => $validated['tipe_ruangan'],
            'ruangan' => $validated['ruangan'],
            'tanggal_peminjaman' => $validated['tanggal_peminjaman'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_selesai' => $validated['waktu_selesai'],
            'keperluan' => $validated['keperluan'],
            'status' => 'Belum Diproses',
        ]);

        // ================= GENERATE KODE PEMINJAMAN (URUT) =================
        $tanggalFormat = Carbon::parse($peminjaman->tanggal_peminjaman)->format('dmY');

        // Ambil kode terakhir (global, tidak tergantung tanggal)
        $lastKode = PeminjamanRuangan::whereNotNull('kode_peminjaman')
            ->orderBy('id', 'desc')
            ->value('kode_peminjaman');

        // Default mulai dari 1
        $nextNumber = 1;

        if ($lastKode) {
            // Ambil 5 digit terakhir
            $lastNumber = (int) substr($lastKode, -5);
            $nextNumber = $lastNumber + 1;
        }

        // Format jadi 00001
        $urut5Digit = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $kodePeminjaman = 'BP-' . $tanggalFormat . '-' . $urut5Digit;

        // Simpan ke database
        $peminjaman->update([
            'kode_peminjaman' => $kodePeminjaman
        ]);

        // ================= GENERATE PDF =================
        $pdf = PDF::loadView('pdf.bukti-peminjaman', compact('peminjaman'));

        // Folder public
        $folderPath = public_path('pdf/bukti-peminjaman');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        // NAMA FILE SESUAI KODE PEMINJAMAN
        $fileName = 'Bukti Peminjaman #' . $kodePeminjaman . '.pdf';
        $filePath = $folderPath . '/' . $fileName;

        // Simpan PDF ke public
        $pdf->save($filePath);

        // ================= KIRIM EMAIL =================
        Mail::to($peminjaman->email)
            ->send(new BuktiPeminjamanMail($peminjaman, $filePath));

        return redirect()
            ->route('beranda')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim. Kode Peminjaman: ' . $kodePeminjaman);
    }

}
