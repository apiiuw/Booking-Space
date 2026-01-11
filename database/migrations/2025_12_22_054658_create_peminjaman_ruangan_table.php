<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminjaman_ruangan', function (Blueprint $table) {
            $table->id();

            // Relasi user (yang login)
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Identitas user
            $table->string('email');

            // Data penanggung jawab
            $table->string('nama_penanggung_jawab');
            $table->string('nik_penanggung_jawab');
            $table->string('instansi');
            $table->string('jabatan');

            // Detail ruangan
            $table->string('tipe_ruangan');
            $table->string('ruangan');

            // Jadwal
            $table->date('tanggal_peminjaman');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

            // Keperluan
            $table->text('keperluan');

            // Status peminjaman
            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak'
            ])->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman_ruangan');
    }
};
