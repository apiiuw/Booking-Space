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
                'Disetujui',
                'Ditolak'
            ) DEFAULT 'Belum Diproses'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE peminjaman_ruangan 
            MODIFY status ENUM(
                'menunggu',
                'disetujui',
                'ditolak'
            ) DEFAULT 'menunggu'
        ");
    }
};
