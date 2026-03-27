<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE peminjaman_ruangan 
            MODIFY status ENUM(
                'Belum Diproses',
                'Terjadwal',
                'Sedang Berlangsung',
                'Selesai',
                'Ditolak'
            ) DEFAULT 'Belum Diproses'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE peminjaman_ruangan 
            MODIFY status ENUM(
                'Belum Diproses',
                'Ditolak'
            ) DEFAULT 'Belum Diproses'
        ");
    }
};
