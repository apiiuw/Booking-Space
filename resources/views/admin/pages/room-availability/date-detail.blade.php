@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64 min-h-screen bg-slate-50/50 pb-20 relative overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-10%] right-[-10%] w-[35rem] h-[35rem] bg-gradient-to-br from-orange-200/20 to-amber-200/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-5%] w-[30rem] h-[30rem] bg-gradient-to-tr from-orange-100/10 to-amber-100/25 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 pt-6 relative">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-slate-200/80 pb-5 mb-8 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => $roomNumber]) }}"
                    class="inline-flex items-center bg-white/95 hover:bg-white active:scale-95 text-slate-800 border border-slate-200/50 rounded-2xl py-2.5 px-4.5 transition duration-300 shadow-md hover:shadow-lg text-xs font-bold shrink-0">
                    <i class="fa-solid fa-arrow-left mr-2 text-orange-600"></i>
                    Kembali
                </a>
                <div>
                    <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Detail Kalender &bull; {{ $roomName }} {{ $roomNumber }}</span>
                    <h1 class="text-slate-800 text-2xl font-black mt-0.5">Detail Jadwal Ruangan</h1>
                </div>
            </div>
            <div>
                <span class="inline-flex items-center px-4 py-2 rounded-2xl text-xs font-bold bg-white text-slate-700 border border-slate-200 shadow-sm">
                    <i class="fa-regular fa-calendar-days mr-2 text-orange-500"></i>
                    {{ $selectedDate->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>

        {{-- TIMELINE CONTAINER --}}
        <div class="bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.015)]">
            <div class="border-b border-slate-100 pb-3 mb-8">
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Jadwal Harian</span>
                <h2 class="text-slate-800 text-lg font-black mt-0.5">Linimasa Waktu Penggunaan</h2>
            </div>

            <div class="relative pl-8 border-l-2 border-orange-100 space-y-8 ml-4 md:ml-12">
                @foreach ($timeline as $slot)
                    @php
                        $isBooked = $slot['type'] === 'booked';
                    @endphp

                    <div class="relative">
                        <!-- Dot -->
                        <span class="absolute -left-[40px] top-2 flex items-center justify-center w-4.5 h-4.5 rounded-full ring-4 ring-white shadow-md
                            {{ $isBooked ? 'bg-orange-500 animate-pulse' : 'bg-emerald-500' }}">
                        </span>

                        <!-- Waktu -->
                        <div class="absolute -left-20 top-2 text-xs font-bold text-slate-400">
                            {{ $slot['start'] }}
                        </div>

                        <!-- Card -->
                        @if ($isBooked)
                            <div class="bg-white border border-slate-100 hover:border-orange-200/50 shadow-sm rounded-2xl p-5 transition duration-300 max-w-3xl">
                                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="inline-flex items-center text-[10px] font-extrabold px-3 py-1 rounded-full bg-orange-50 text-orange-700 border border-orange-100 uppercase tracking-wider">
                                                {{ $slot['start'] }} &ndash; {{ $slot['end'] }}
                                            </span>
                                            <span class="inline-flex items-center text-[10px] font-extrabold px-3 py-1 rounded-full bg-slate-50 text-slate-600 border border-slate-200 uppercase tracking-wider">
                                                TERPAKAI
                                            </span>
                                        </div>

                                        <h4 class="text-sm font-bold text-slate-800 mt-2">{{ $slot['data']->nama_penanggung_jawab }}</h4>
                                        <p class="text-xs text-slate-500 font-semibold mt-0.5">{{ $slot['data']->instansi }}</p>
                                        
                                        <div class="mt-4 bg-slate-50 rounded-2xl p-3 border border-slate-100/50 text-xs text-slate-600 font-semibold">
                                            Keperluan: {{ $slot['data']->keperluan }}
                                        </div>
                                    </div>

                                    <div>
                                        @php
                                            $badgeColor = 'bg-slate-50 text-slate-600 border-slate-200/50';
                                            if ($slot['data']->status === 'disetujui') {
                                                $badgeColor = 'bg-emerald-50 text-emerald-700 border-emerald-200/40';
                                            } elseif ($slot['data']->status === 'menunggu') {
                                                $badgeColor = 'bg-yellow-50 text-yellow-700 border-yellow-200/40';
                                            } elseif ($slot['data']->status === 'ditolak') {
                                                $badgeColor = 'bg-rose-50 text-rose-700 border-rose-200/40';
                                            }
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold border uppercase tracking-wider {{ $badgeColor }}">
                                            {{ $slot['data']->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-emerald-50/40 border border-emerald-100 rounded-2xl p-4.5 max-w-3xl">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <span class="inline-flex items-center text-[10px] font-extrabold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-150 uppercase tracking-wider">
                                        {{ $slot['start'] }} &ndash; {{ $slot['end'] }}
                                    </span>
                                    <span class="inline-flex items-center text-[10px] font-extrabold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-150 uppercase tracking-wider">
                                        TERSEDIA
                                    </span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">
                                    Durasi slot kosong: <span class="font-extrabold text-emerald-700">{{ floor($slot['duration'] / 60) }} Jam</span>
                                </p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>

@endsection
