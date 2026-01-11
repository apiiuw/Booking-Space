<?php

namespace App\Http\Controllers\User\PeminjamanRuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        return view('user.pages.peminjaman-ruangan.index');
    }
}
