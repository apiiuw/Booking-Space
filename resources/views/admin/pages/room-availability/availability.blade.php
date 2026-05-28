@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64 min-h-screen bg-slate-50/50 pb-20 relative overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-10%] right-[-10%] w-[35rem] h-[35rem] bg-gradient-to-br from-orange-200/20 to-amber-200/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-5%] w-[30rem] h-[30rem] bg-gradient-to-tr from-orange-100/10 to-amber-100/25 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 pt-6 relative">
        @php
            use Carbon\Carbon;

            $timezone = 'Asia/Jakarta';
            $now = Carbon::now($timezone);

            $currentMonth = request()->get('month', $now->month);
            $currentYear = request()->get('year', $now->year);

            $displayedMonth = Carbon::createFromDate($currentYear, $currentMonth, 1, 0, 0, 0, $timezone);

            $prevMonth = $displayedMonth->copy()->subMonth();
            $nextMonth = $displayedMonth->copy()->addMonth();

            $startOfMonth = $displayedMonth->copy()->startOfMonth();
            $daysInMonth = $displayedMonth->daysInMonth;
            $firstDayOfWeek = $startOfMonth->dayOfWeek;

            $tanggalMerah = [
                Carbon::create($currentYear, 1, 1),
                Carbon::create($currentYear, 8, 17),
                Carbon::create($currentYear, 12, 25),
            ];
        @endphp

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-200/80 pb-5 mb-8">
            <div>
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Informasi Jadwal &bull; {{ $roomName }} {{ $roomNumber }}</span>
                <h1 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Ketersediaan Jadwal
                </h1>
                <p class="text-slate-500 text-xs md:text-sm mt-1">Lihat status ketersediaan harian untuk tipe ruangan ini.</p>
            </div>
        </div>

        {{-- CALENDAR WRAPPER --}}
        <div class="bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.015)]">
            
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
                <!-- Kosong sebelum tanggal 1 -->
                @for ($i = 0; $i < $firstDayOfWeek; $i++)
                    <div></div>
                @endfor

                <!-- Tanggal dalam bulan -->
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php
                        $date = Carbon::create($currentYear, $currentMonth, $day, 0, 0, 0, $timezone);
                        $dateKey = $date->format('Y-m-d');

                        $isSunday = $date->dayOfWeek === Carbon::SUNDAY;
                        $isHoliday = collect($tanggalMerah)->contains(fn($d) => $d->isSameDay($date));

                        $bookings = $peminjaman[$dateKey] ?? collect();

                        $totalMinutes = $bookings->sum(function ($item) {
                            $start = Carbon::parse($item->waktu_mulai);
                            $end   = Carbon::parse($item->waktu_selesai);
                            return $end->diffInMinutes($start);
                        });

                        $isFull = $totalMinutes >= 600;
                    @endphp

                    {{-- TANGGAL MERAH --}}
                    @if ($isSunday || $isHoliday)
                        <div class="p-3.5 border rounded-2xl bg-red-50 text-red-650 border-red-150 cursor-not-allowed opacity-60 flex flex-col justify-between h-20">
                            <p class="font-extrabold text-sm md:text-base text-left">{{ $day }}</p>
                            <p class="text-[8px] md:text-[9px] uppercase font-black tracking-wider text-right">Libur</p>
                        </div>

                    {{-- FULL --}}
                    @elseif ($isFull)
                        <a href="{{ route('room.availability.date', [
                            'type' => $type,
                            'roomNumber' => $roomNumber,
                            'date' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3.5 border rounded-2xl bg-rose-50 text-rose-650 border-rose-150 hover:scale-105 active:scale-95 transition-all duration-300 shadow-[0_4px_15px_rgba(0,0,0,0.01)] hover:shadow-md flex flex-col justify-between h-20">
                            <p class="font-extrabold text-sm md:text-base text-left">{{ $day }}</p>
                            <p class="text-[8px] md:text-[9px] uppercase font-black tracking-wider text-right">Penuh</p>
                        </a>

                    {{-- TERPAKAI --}}
                    @elseif ($bookings->count() > 0)
                        <a href="{{ route('room.availability.date', [
                            'type' => $type,
                            'roomNumber' => $roomNumber,
                            'date' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3.5 border rounded-2xl bg-amber-50 text-amber-700 border-amber-200/60 hover:scale-105 active:scale-95 transition-all duration-300 shadow-[0_4px_15px_rgba(0,0,0,0.01)] hover:shadow-md flex flex-col justify-between h-20">
                            <p class="font-extrabold text-sm md:text-base text-left">{{ $day }}</p>
                            <p class="text-[8px] md:text-[9px] uppercase font-black tracking-wider text-right">Terpakai</p>
                        </a>

                    {{-- TERSEDIA --}}
                    @else
                        <a href="{{ route('room.availability.date', [
                            'type' => $type,
                            'roomNumber' => $roomNumber,
                            'date' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3.5 border rounded-2xl bg-emerald-50 text-emerald-700 border-emerald-200/60 hover:scale-105 active:scale-95 transition-all duration-300 shadow-[0_4px_15px_rgba(0,0,0,0.01)] hover:shadow-md flex flex-col justify-between h-20">
                            <p class="font-extrabold text-sm md:text-base text-left">{{ $day }}</p>
                            <p class="text-[8px] md:text-[9px] uppercase font-black tracking-wider text-right">Tersedia</p>
                        </a>
                    @endif
                @endfor
            </div>

            <!-- Legends -->
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
                    <span class="w-4 h-4 bg-rose-50 border border-rose-200 rounded-lg"></span>
                    <span class="text-slate-600 text-xs font-bold">Penuh (Full Booking)</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 bg-red-50 border border-red-150 rounded-lg"></span>
                    <span class="text-slate-600 text-xs font-bold">Hari Libur / Tanggal Merah</span>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
