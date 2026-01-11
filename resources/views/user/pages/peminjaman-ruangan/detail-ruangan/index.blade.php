@extends('user.layouts.main')
@section('container')

<div class="h-full bg-white">
    <div class="relative flex justify-end items-center pr-20 pt-32 bg-cover bg-center h-[40vh]" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20 "></div>

        <a href="{{ url()->previous() }}"
            class="absolute flex justify-center items-center top-1/2 left-5 bg-orange-600 text-white rounded-full py-3 px-5 hover:bg-orange-700 transition duration-300 shadow-lg">
            <i class="fa-solid fa-angles-left"></i>
            <p class="ml-2 pt-0.5">Kembali</p>
        </a>


        <h1 class="relative h-1/2 font-raleway font-extrabold text-4xl text-orange-600">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}</h1>
    </div>

    <div class="flex flex-row grid-cols-1 md:grid-cols-2">
        <div class="w-1/2">
            <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Rapat">
        </div>
        <div class="flex flex-col justify-center w-1/2 p-10">
            <h1 class="text-orange-600 text-2xl font-raleway font-bold mb-4">Detail Ruangan</h1>

            <table class="w-full border border-gray-300">
                <tbody>
                    <tr class="border border-gray-300">
                        <td class="bg-orange-600 text-white font-medium px-4 py-2 w-1/3">Nama Ruangan</td>
                        <td class="bg-white text-gray-800 px-4 py-2">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}</td>
                    </tr>
                    <tr class="border border-gray-300">
                        <td class="bg-orange-600 text-white font-medium px-4 py-2">Kapasitas</td>
                        <td class="bg-white text-gray-800 px-4 py-2">30 Orang</td>
                    </tr>
                    <tr class="border border-gray-300">
                        <td class="bg-orange-600 text-white font-medium px-4 py-2">Fasilitas</td>
                        <td class="bg-white text-gray-800 px-4 py-2">Proyektor, AC, Meja, Kursi</td>
                    </tr>
                    <tr class="border border-gray-300">
                        <td class="bg-orange-600 text-white font-medium px-4 py-2">Jadwal Peminjaman</td>
                        <td class="bg-white text-gray-800 px-4 py-2">Senin s/d Jumat</td>
                    </tr>
                    <tr class="border border-gray-300">
                        <td class="bg-orange-600 text-white font-medium px-4 py-2">Waktu Peminjaman</td>
                        <td class="bg-white text-gray-800 px-4 py-2">08:00 - 17:00</td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-center items-center mt-10">
                <a href="#ketersediaan-jadwal"
                class="text-white hover:text-gray-300 bg-orange-600 hover:bg-orange-700 px-3 py-2 font-semibold">
                    Pilih Jadwal Peminjaman
                </a>
            </div>
        </div>
    </div>

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

    <div id="ketersediaan-jadwal" class="h-full flex flex-col px-10 justify-start py-10">
        <h1 class="text-orange-600 text-2xl font-raleway font-bold mb-4">Ketersediaan Jadwal</h1>
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
                    $isSunday = $date->dayOfWeek === Carbon::SUNDAY;
                    $isHoliday = collect($tanggalMerah)->contains(fn($d) => $d->isSameDay($date));

                    if ($isSunday || $isHoliday) {
                        $status = 'Tanggal Merah';
                        $bgColor = 'bg-red-100 hover:bg-red-200 text-red-700';
                    } else {
                        $status = rand(0, 1) ? 'Tersedia' : 'Terpakai'; // simulasi data
                        $bgColor = match($status) {
                            'Tersedia' => 'bg-green-100 hover:bg-green-200 text-green-700',
                            'Terpakai' => 'bg-yellow-100 hover:bg-yellow-200 text-yellow-700',
                        };
                    }
                @endphp

                @if ($status === 'Tanggal Merah')
                    <div class="p-3 border rounded {{ $bgColor }} cursor-not-allowed opacity-60">
                        <p class="font-semibold text-gray-800">{{ $day }}</p>
                        <p class="text-xs">{{ $status }}</p>
                    </div>
                @else
                    <a href="{{ route('peminjamanRuangan.pengajuan-peminjaman', [
                        'tipe' => $tipe,
                        'ruangan' => $ruangan,
                        'tanggal' => $date->format('d-m-Y')
                    ]) }}"
                    class="block p-3 border rounded {{ $bgColor }} cursor-pointer transition-all hover:scale-105">
                        <p class="font-semibold text-gray-800">{{ $day }}</p>
                        <p class="text-xs">{{ $status }}</p>
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
                <div class="w-4 h-4 bg-red-300 border border-gray-400 rounded"></div>
                <span class="text-gray-700 text-sm">Tanggal Merah</span>
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