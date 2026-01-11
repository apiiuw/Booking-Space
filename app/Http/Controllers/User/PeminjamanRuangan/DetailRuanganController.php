<?php

namespace App\Http\Controllers\User\PeminjamanRuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailRuanganController extends Controller
{
    public function index(string $tipe, string $ruangan)
    {
        return view('user.pages.peminjaman-ruangan.detail-ruangan.index', [
            'tipe' => $tipe,
            'ruangan' => $ruangan,
        ]);
    }
}

