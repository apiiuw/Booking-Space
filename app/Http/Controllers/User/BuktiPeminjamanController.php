<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanRuangan;

class BuktiPeminjamanController extends Controller
{
    public function index()
    {
        $emailUser = Auth::user()->email;

        $peminjaman = PeminjamanRuangan::where('email', $emailUser)
            ->orderBy('tanggal_peminjaman', 'desc')
            ->get();

        return view('user.pages.user.bukti-peminjaman.index', compact('peminjaman'));
    }
}
