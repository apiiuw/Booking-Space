<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanRuangan;

class RiwayatPeminjamanController extends Controller
{
    public function index()
    {
        $emailUser = Auth::user()->email;

        $riwayat = PeminjamanRuangan::where('email', $emailUser)
            ->where('status', 'Selesai')
            ->orderBy('tanggal_peminjaman', 'desc')
            ->get();

        return view('user.pages.user.riwayat-peminjaman.index', compact('riwayat'));
    }
}
