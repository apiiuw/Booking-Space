<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('peminjaman_ruangan', function (Blueprint $table) {
            $table->string('document_user')->nullable();
            $table->string('document_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman_ruangan', function (Blueprint $table) {
            $table->dropColumn(['document_user', 'document_admin']);
        });
    }
};
