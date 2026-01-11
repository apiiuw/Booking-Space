<?php

namespace App\Http\Controllers\User\PeminjamanRuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipeRuanganController extends Controller
{
    public function index(string $tipe)
    {
        // contoh hasil: "rapat"
        return view('user.pages.peminjaman-ruangan.tipe-ruangan.index', [
            'tipe' => $tipe
        ]);
    }
}
