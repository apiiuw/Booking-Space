<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    protected $table = 'peminjaman_ruangan';

    protected $fillable = [
        'user_id',
        'email',
        'nama_penanggung_jawab',
        'nik_penanggung_jawab',
        'instansi',
        'jabatan',
        'tipe_ruangan',
        'ruangan',
        'tanggal_peminjaman',
        'waktu_mulai',
        'waktu_selesai',
        'keperluan',
        'status',
    ];
}
