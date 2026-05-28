<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE peminjaman_ruangan DROP CONSTRAINT IF EXISTS peminjaman_ruangan_status_check');
        }
    }

    public function down(): void
    {
        // No restore needed as column is string
    }
};
