@extends('admin.layouts.main')

@section('container')
<div class="p-4 sm:ml-64 min-h-screen">
    <div class="p-4">

        @php
            use Carbon\Carbon;

            $timezone = 'Asia/Jakarta';
            $now = Carbon::now($timezone);

            // Ambil bulan yang sedang ditampilkan (default: sekarang)
            $currentMonth = request()->get('month', $now->month);
            $currentYear = request()->get('year', $now->year);

            $displayedMonth = Carbon::createFromDate($currentYear, $currentMonth, 1, 0, 0, 0, $timezone);

            // Hitung navigasi bulan sebelumnya & berikutnya
            $prevMonth = $displayedMonth->copy()->subMonth();
            $nextMonth = $displayedMonth->copy()->addMonth();

            // Hari pertama & jumlah hari di bulan ini
            $startOfMonth = $displayedMonth->copy()->startOfMonth();
            $daysInMonth = $displayedMonth->daysInMonth;
            $firstDayOfWeek = $startOfMonth->dayOfWeek; // 0 = Minggu

            // Contoh daftar tanggal merah nasional (dummy)
            $tanggalMerah = [
                Carbon::create($currentYear, 1, 1),   // Tahun Baru
                Carbon::create($currentYear, 8, 17),  // HUT RI
                Carbon::create($currentYear, 12, 25), // Natal
            ];
        @endphp

        <div class="min-h-screen flex flex-col justify-start">
            <h1 class="text-orange-600 text-2xl font-bold">Ketersediaan Jadwal {{ $roomName }} {{ $roomNumber }}</h1>
            <h3 class="text-orange-600 text-md mb-3">Halaman ketersediaan untuk tipe <b>{{ $roomName }} {{ $roomNumber }}</b></h3>
            <hr class="bg-gray-500 mb-6">

            <!-- Navigasi Bulan -->
            <div class="flex justify-between items-center mb-2">
                <a href="?month={{ $prevMonth->month }}&year={{ $prevMonth->year }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded transition">&lt;</a>

                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $displayedMonth->translatedFormat('F Y') }}
                </h2>

                <a href="?month={{ $nextMonth->month }}&year={{ $nextMonth->year }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded transition">&gt;</a>
            </div>

            <!-- Nama Hari di bawah judul bulan -->
            <div class="grid grid-cols-7 text-center font-semibold border-b border-gray-300 mb-4 mt-2 text-gray-700">
                <div>Min</div>
                <div>Sen</div>
                <div>Sel</div>
                <div>Rab</div>
                <div>Kam</div>
                <div>Jum</div>
                <div>Sab</div>
            </div>

            <!-- Grid Kalender -->
            <div class="grid grid-cols-7 gap-2 text-center">
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

                        // Data peminjaman di tanggal ini
                        $bookings = $peminjaman[$dateKey] ?? collect();

                        // Hitung total menit terpakai
                        $totalMinutes = $bookings->sum(function ($item) {
                            $start = Carbon::parse($item->waktu_mulai);
                            $end   = Carbon::parse($item->waktu_selesai);
                            return $end->diffInMinutes($start);
                        });

                        // 07.00 - 17.00 = 600 menit
                        $isFull = $totalMinutes >= 600;
                    @endphp

                    {{-- TANGGAL MERAH --}}
                    @if ($isSunday || $isHoliday)
                        <div class="p-3 border rounded bg-red-100 text-red-700 cursor-not-allowed">
                            <p class="font-semibold text-gray-800">{{ $day }}</p>
                            <p class="text-xs">Tanggal Merah</p>
                        </div>

                    {{-- FULL --}}
                    @elseif ($isFull)
                        <a href="{{ route('room.availability.date', [
                            'type' => $type,
                            'roomNumber' => $roomNumber,
                            'date' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3 border rounded bg-red-200 hover:bg-red-300 text-red-800">
                            <p class="font-semibold text-gray-800">{{ $day }}</p>
                            <p class="text-xs font-semibold">Full</p>
                        </a>

                    {{-- TERPAKAI --}}
                    @elseif ($bookings->count() > 0)
                        <a href="{{ route('room.availability.date', [
                            'type' => $type,
                            'roomNumber' => $roomNumber,
                            'date' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3 border rounded bg-yellow-100 hover:bg-yellow-200 text-yellow-700">
                            <p class="font-semibold text-gray-800">{{ $day }}</p>
                            <p class="text-xs">Terpakai</p>
                        </a>

                    {{-- TERSEDIA --}}
                    @else
                        <a href="{{ route('room.availability.date', [
                            'type' => $type,
                            'roomNumber' => $roomNumber,
                            'date' => $date->format('d-m-Y')
                        ]) }}"
                        class="block p-3 border rounded bg-green-100 hover:bg-green-200 text-green-700">
                            <p class="font-semibold text-gray-800">{{ $day }}</p>
                            <p class="text-xs">Tersedia</p>
                        </a>
                    @endif
                @endfor


            </div>

            <!-- Keterangan Warna -->
            <div class="flex gap-6 mt-6">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-green-300 border border-gray-400 rounded"></div>
                    <span class="text-gray-700 text-sm">Tersedia</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-yellow-300 border border-gray-400 rounded"></div>
                    <span class="text-gray-700 text-sm">Terpakai</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-red-400 border border-gray-400 rounded"></div>
                    <span class="text-gray-700 text-sm">Full</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-red-300 border border-gray-400 rounded"></div>
                    <span class="text-gray-700 text-sm">Tanggal Merah</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
