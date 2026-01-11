<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomAvailabilityController;
use App\Http\Controllers\Admin\LoanRequestController;
use App\Http\Controllers\Admin\LoanHistoryController;
use App\Http\Controllers\Admin\RoomSettingController;

use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\PeminjamanRuangan\PeminjamanRuanganController;
use App\Http\Controllers\User\PeminjamanRuangan\DetailRuanganController;
use App\Http\Controllers\User\PeminjamanRuangan\TipeRuanganController;
use App\Http\Controllers\User\PeminjamanRuangan\PengajuanPeminjamanController;
use App\Http\Controllers\User\PanduanController;
use App\Http\Controllers\User\KontakController;

use App\Http\Controllers\User\BuktiPeminjamanController;
use App\Http\Controllers\User\RiwayatPeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/peminjaman-ruangan', [PeminjamanRuanganController::class, 'index'])->name('peminjamanRuangan');

Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::middleware(['auth'])->group(function () {
    Route::get(
        '/peminjaman-ruangan/tipe-ruangan/{tipe}',
        [TipeRuanganController::class, 'index']
    )->name('peminjamanRuangan.tipe');
    Route::get(
        '/peminjaman-ruangan/{tipe}/{ruangan}',
        [DetailRuanganController::class, 'index']
    )->name('peminjamanRuangan.detail');

    Route::get(
        '/peminjaman-ruangan/{tipe}/{ruangan}/{tanggal}',
        [PengajuanPeminjamanController::class, 'index']
    )->name('peminjamanRuangan.pengajuan-peminjaman');

    Route::post(
        '/peminjaman-ruangan/{tipe}/{ruangan}/{tanggal}',
        [PengajuanPeminjamanController::class, 'store']
    )->name('peminjamanRuangan.pengajuan-peminjaman.store');



    Route::get('/user/bukti-peminjaman', [BuktiPeminjamanController::class, 'index'])->name('bukti.peminjaman');
    Route::get('/user/riwayat-peminjaman', [RiwayatPeminjamanController::class, 'index'])->name('riwayat.peminjaman');

});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.admin');

    Route::get('/admin/room-availability', [RoomAvailabilityController::class, 'index'])
        ->name('room.availability.index');

    Route::get('/admin/room-availability/{type}', [RoomAvailabilityController::class, 'showDetail'])
        ->name('room.availability.detail');

    Route::get('/admin/room-availability/{type}/{roomNumber}', [RoomAvailabilityController::class, 'showRoom'])
        ->name('room.availability.room');

    Route::get('/admin/room-availability/{type}/{roomNumber}/{date}', [RoomAvailabilityController::class, 'showDate'])
        ->name('room.availability.date');

    Route::get('/admin/loan-request', [LoanRequestController::class, 'index'])
        ->name('loan.request.index');
    Route::patch('/admin/loan-request/{id}/approve', [LoanRequestController::class, 'approve']
    )->name('loan.request.approve');
    Route::patch('/admin/loan-request/reject', [LoanRequestController::class, 'reject']
    )->name('loan.request.reject');

    Route::get('/admin/loan-history', [LoanHistoryController::class, 'index'])
        ->name('loan.history.index');

    Route::get('/admin/room-setting', [RoomSettingController::class, 'index'])
        ->name('room.setting.index');
    Route::get('/admin/room-setting/create', [RoomSettingController::class, 'create'])
        ->name('room.setting.create');
    Route::post('/admin/room-setting', [RoomSettingController::class, 'store'])
        ->name('room.setting.store');

    Route::get('/admin/room-setting/{type}', [RoomSettingController::class, 'showRoomNumber'])
        ->name('room.setting.room-number');

    Route::get('/admin/room-setting/{type}/{room}', [RoomSettingController::class, 'showRoom'])
        ->name('room.setting.room');

    Route::get('/admin/room-setting/{type}/{room}/edit', [RoomSettingController::class, 'editRoom'])
        ->name('room.setting.edit');
    Route::put('/admin/room-setting/{type}/{room}', [RoomSettingController::class, 'updateRoom'])
        ->name('room.setting.update');
});



