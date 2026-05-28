@extends('user.layouts.main')
@section('container')

<div class="relative min-h-screen bg-slate-50 pb-24 overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-5%] right-[-5%] w-[45rem] h-[45rem] bg-gradient-to-br from-orange-200/30 to-amber-150/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-10%] w-[35rem] h-[35rem] bg-gradient-to-tr from-orange-100/20 to-amber-100/30 rounded-full blur-3xl -z-10"></div>

    <!-- Hero Banner with Glassmorphism Title & Back Button -->
    <div class="relative flex justify-start items-center px-6 md:px-20 pt-36 bg-cover bg-center h-[42vh] md:h-[48vh] shadow-lg rounded-b-[40px] overflow-hidden" 
        style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-900/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-transparent to-transparent"></div>

        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => $tipe]) }}"
            class="absolute top-8 left-6 md:left-20 flex items-center bg-white/95 hover:bg-white active:scale-95 text-slate-800 backdrop-blur-md border border-slate-200/50 rounded-2xl py-2.5 px-4.5 transition duration-300 shadow-md hover:shadow-lg text-xs font-bold z-20">
            <i class="fa-solid fa-arrow-left mr-2 text-orange-600"></i>
            Kembali
        </a>

        <div class="relative z-10 bg-white/90 backdrop-blur-xl border border-white/60 p-6 md:p-8 rounded-3xl shadow-[0_20px_50px_rgba(249,115,22,0.15)] max-w-2xl mt-8 md:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-widest mb-3">
                Detail Fasilitas
            </span>
            <h1 class="font-black text-3xl md:text-4xl text-slate-800 leading-tight tracking-tight">
                Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}
            </h1>
        </div>
    </div>

    <!-- Main Grid: Image and Room Metadata -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 mt-12 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
            
            <!-- Left Side: Image -->
            <div class="lg:col-span-7 bg-white p-3 rounded-[32px] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden flex flex-col justify-center">
                <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Rapat" class="w-full h-80 md:h-[420px] object-cover rounded-2xl shadow-inner transform hover:scale-[1.01] transition-transform duration-500">
            </div>

            <!-- Right Side: Details Card -->
            <div class="lg:col-span-5 bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] flex flex-col justify-between">
                <div>
                    <h2 class="text-slate-800 text-xl font-extrabold border-b border-slate-100 pb-4 flex items-center">
                        <span class="w-2.5 h-6 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25 text-orange-600"></span>
                        Informasi Ruangan
                    </h2>
                    
                    <div class="mt-6 space-y-4 text-xs md:text-sm text-slate-600">
                        <div class="flex justify-between py-3 border-b border-slate-100/50">
                            <span class="text-slate-400 font-medium">Nama Ruangan</span>
                            <span class="font-bold text-slate-800">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-slate-100/50">
                            <span class="text-slate-400 font-medium">Kapasitas</span>
                            <span class="font-bold text-slate-800">30 Orang</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-slate-100/50">
                            <span class="text-slate-400 font-medium">Fasilitas</span>
                            <span class="font-bold text-slate-800 text-right">Proyektor, AC, Meja, Kursi</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-slate-100/50">
                            <span class="text-slate-400 font-medium">Hari Operasional</span>
                            <span class="font-bold text-slate-800">Senin s/d Jumat</span>
                        </div>
                        <div class="flex justify-between py-3">
                            <span class="text-slate-400 font-medium">Waktu Pelayanan</span>
                            <span class="font-bold text-slate-800">07:00 - 17:00</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#ketersediaan-jadwal"
                        class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-4 px-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 tracking-wider uppercase text-xs">
                        Pilih Jadwal Peminjaman
                        <i class="fa-solid fa-arrow-down ml-2 animate-bounce"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Section -->
    <div id="ketersediaan-jadwal" class="max-w-7xl mx-auto px-6 md:px-20 mt-16 scroll-mt-24 relative">
        <div class="bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
            <div class="border-b border-slate-200/80 pb-4 mb-6">
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Kalender Reservasi</span>
                <h2 class="text-slate-800 text-2xl font-black flex items-center mt-1">
                    <i class="fa-regular fa-calendar text-orange-600 mr-3"></i>
                    Ketersediaan Jadwal
                </h2>
                <p class="text-xs text-slate-500 mt-2">Silakan pilih tanggal untuk mengajukan peminjaman ruangan.</p>
            </div>

            <!-- Month Navigation -->
            <div class="flex justify-between items-center bg-slate-50 p-4 rounded-2xl mb-8 border border-slate-100">
                <a href="?month={{ $prevMonth->month }}&year={{ $prevMonth->year }}"
                    class="bg-white hover:bg-orange-50 hover:text-orange-600 active:scale-90 text-slate-700 font-bold w-11 h-11 flex justify-center items-center rounded-xl shadow-sm border border-slate-200/50 transition">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </a>

                <h3 class="text-lg font-black text-slate-800 tracking-tight">
                    {{ $displayedMonth->translatedFormat('F Y') }}
                </h3>

                <a href="?month={{ $nextMonth->month }}&year={{ $nextMonth->year }}"
                    class="bg-white hover:bg-orange-50 hover:text-orange-600 active:scale-90 text-slate-700 font-bold w-11 h-11 flex justify-center items-center rounded-xl shadow-sm border border-slate-200/50 transition">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

            <!-- Day Headers -->
            <div class="grid grid-cols-7 text-center font-extrabold text-[10px] md:text-xs text-slate-400 mb-4 py-2 border-b border-slate-100 uppercase tracking-widest">
                <div>Min</div>
                <div>Sen</div>
                <div>Sel</div>
                <div>Rab</div>
                <div>Kam</div>
                <div>Jum</div>
                <div>Sab</div>
            </div>

            <!-- Calendar Days -->
            <div class="grid grid-cols-7 gap-3 text-center">
                <!-- Spacing before first day of month -->
                @for ($i = 0; $i < $firstDayOfWeek; $i++)
                    <div></div>
                @endfor

                <!-- Month days -->
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php
                        $date = \Carbon\Carbon::create(
                            $currentYear,
                            $currentMonth,
                            $day,
                            0,
                            0,
                            0,
                            $timezone
                        );

                        $dateKey = $date->toDateString();
                        $today = \Carbon\Carbon::now($timezone)->startOfDay();

                        $isPastDate = $date->lt($today);
                        $isSunday = $date->dayOfWeek === \Carbon\Carbon::SUNDAY;
                        $isHoliday = $tanggalMerah->contains(fn ($d) => $d->isSameDay($date));

                        // Data booking di tanggal ini
                        $bookings = $peminjaman[$dateKey] ?? collect();

                        $isFullBooked = false;
                        if ($bookings->isNotEmpty()) {
                            $earliest = $bookings->min('waktu_mulai');
                            $latest   = $bookings->max('waktu_selesai');
                            if ($earliest <= '07:00:00' && $latest >= '17:00:00') {
                                $isFullBooked = true;
                            }
                        }

                        if ($isPastDate) {
                            $status = 'Expired';
                            $bgColor = 'bg-slate-100/70 text-slate-400 border-slate-200/50';
                            $clickable = false;
                        } elseif ($isSunday || $isHoliday) {
                            $status = 'Libur';
                            $bgColor = 'bg-red-50 text-red-600 border-red-150';
                            $clickable = false;
                        } elseif ($isFullBooked) {
                            $status = 'Penuh';
                            $bgColor = 'bg-rose-50 text-rose-600 border-rose-150';
                            $clickable = false;
                        } elseif ($bookings->isNotEmpty()) {
                            $status = 'Terpakai';
                            $bgColor = 'bg-amber-50 text-amber-700 border-amber-200/60 hover:bg-amber-100/50';
                            $clickable = true;
                        } else {
                            $status = 'Tersedia';
                            $bgColor = 'bg-emerald-50 text-emerald-700 border-emerald-200/60 hover:bg-emerald-100/50';
                            $clickable = true;
                        }
                    @endphp

                    @if (!$clickable)
                        <div class="p-3.5 border rounded-2xl {{ $bgColor }} cursor-not-allowed opacity-60 flex flex-col justify-between h-20">
                            <p class="font-extrabold text-sm md:text-base text-left">{{ $day }}</p>
                            <p class="text-[8px] md:text-[9px] uppercase font-black tracking-wider text-right">{{ $status }}</p>
                        </div>
                    @else
                        <a href="{{ route('peminjamanRuangan.pengajuan-peminjaman', [
                            'tipe' => $tipe,
                            'ruangan' => $ruangan,
                            'tanggal' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3.5 border rounded-2xl {{ $bgColor }} hover:scale-105 active:scale-95 transition-all duration-300 shadow-[0_4px_15px_rgba(0,0,0,0.01)] hover:shadow-md flex flex-col justify-between h-20">
                            <p class="font-extrabold text-sm md:text-base text-left">{{ $day }}</p>
                            <p class="text-[8px] md:text-[9px] uppercase font-black tracking-wider text-right">{{ $status }}</p>
                        </a>
                    @endif
                @endfor
            </div>

            <!-- Legend Info -->
            <div class="flex flex-wrap gap-4 md:gap-8 mt-10 pt-6 border-t border-slate-150">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 bg-emerald-50 border border-emerald-200 rounded-lg"></span>
                    <span class="text-slate-600 text-xs font-bold">Tersedia</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 bg-amber-50 border border-amber-200 rounded-lg"></span>
                    <span class="text-slate-600 text-xs font-bold">Terpakai (Sebagian Jam)</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 bg-rose-55 border border-rose-200 rounded-lg"></span>
                    <span class="text-slate-600 text-xs font-bold">Penuh (Full Booking)</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 bg-red-50 border border-red-150 rounded-lg"></span>
                    <span class="text-slate-600 text-xs font-bold">Hari Libur</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<style>
  html {
    scroll-behavior: smooth;
  }
</style>
@endpush