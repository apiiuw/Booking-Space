@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64 min-h-screen bg-slate-50/50 pb-20 relative overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-10%] right-[-10%] w-[35rem] h-[35rem] bg-gradient-to-br from-orange-200/20 to-amber-200/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-5%] w-[30rem] h-[30rem] bg-gradient-to-tr from-orange-100/10 to-amber-100/25 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 pt-6 relative">
        
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-200/80 pb-5 mb-8">
            <div>
                <a href="{{ route('room.availability.index') }}" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-bold text-xs mb-3 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Pencarian
                </a>
                <h1 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Hasil Pencarian Ruangan Kosong
                </h1>
                <p class="text-slate-600 text-sm mt-3 font-bold flex flex-wrap items-center gap-3">
                    <span class="bg-white px-3 py-1.5 rounded-lg border border-slate-200 shadow-sm"><i class="fa-regular fa-calendar-check text-orange-500 mr-2"></i> {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, j F Y') }}</span>
                    <span class="bg-white px-3 py-1.5 rounded-lg border border-slate-200 shadow-sm"><i class="fa-regular fa-clock text-orange-500 mr-2"></i> {{ $waktu_mulai }} - {{ $waktu_selesai }}</span>
                </p>
            </div>
        </div>

        @if(count($groupedRooms) > 0)
            @foreach($groupedRooms as $type => $rooms)
                <div class="mb-12">
                    <div class="border-b border-slate-200/80 pb-4 mb-6">
                        <h2 class="text-slate-800 text-2xl font-black flex items-center">
                            <span class="w-2.5 h-6 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3"></span>
                            {{ $type }}
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($rooms as $room)
                            <!-- Room Card -->
                            <div class="group bg-white rounded-3xl border border-emerald-100/50 hover:border-emerald-300 shadow-sm hover:shadow-[0_15px_30px_rgba(16,185,129,0.1)] transition-all duration-300 flex flex-col overflow-hidden transform hover:-translate-y-1">
                                <div class="relative overflow-hidden h-40">
                                    <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                                    <div class="absolute top-3 right-3 bg-emerald-500/90 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-extrabold text-white shadow-md uppercase tracking-wider flex items-center">
                                        <i class="fa-solid fa-check-circle mr-1.5"></i> Tersedia
                                    </div>
                                    <div class="absolute bottom-3 left-3">
                                        <h3 class="text-white font-bold text-lg leading-tight">{{ $room->name }}</h3>
                                    </div>
                                </div>
                                <div class="p-5 flex-1 flex flex-col justify-between">
                                    <div class="space-y-2 mb-4">
                                        <div class="flex items-start text-xs text-slate-500">
                                            <i class="fa-solid fa-users text-orange-500 mt-0.5 mr-2 w-4 text-center"></i>
                                            <span>Kapasitas: <span class="font-bold text-slate-700">{{ $room->capacity }} Orang</span></span>
                                        </div>
                                        <div class="flex items-start text-xs text-slate-500">
                                            <i class="fa-solid fa-list-check text-orange-500 mt-0.5 mr-2 w-4 text-center"></i>
                                            <span class="line-clamp-2">Fasilitas: <span class="font-medium">{{ $room->facilities }}</span></span>
                                        </div>
                                    </div>
                                    
                                    @php
                                        $nameParts = explode(' ', $room->name);
                                        $roomIdentifier = end($nameParts);
                                    @endphp

                                    <a href="{{ route('room.availability.date', [
                                            'type' => $room->url,
                                            'roomNumber' => $roomIdentifier,
                                            'date' => \Carbon\Carbon::parse($tanggal)->format('d-m-Y')
                                        ]) }}" 
                                        class="w-full inline-flex justify-center items-center bg-orange-50 hover:bg-orange-500 hover:text-white text-orange-600 font-extrabold py-3 px-4 rounded-xl transition-all duration-300 text-xs tracking-wider uppercase border border-orange-100 hover:border-transparent">
                                        <i class="fa-solid fa-calendar-days mr-2"></i>
                                        Lihat Kalender
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white rounded-3xl border border-slate-100 p-12 text-center shadow-sm">
                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-calendar-xmark text-3xl"></i>
                </div>
                <h3 class="text-xl font-black text-slate-800 mb-2">Tidak Ada Ruangan Kosong</h3>
                <p class="text-slate-500 text-sm max-w-md mx-auto">Maaf, pada tanggal dan jam yang Anda pilih seluruh ruangan telah dipesan atau terpakai. Silakan coba cari di rentang waktu atau tanggal lain.</p>
                <a href="{{ route('room.availability.index') }}" class="inline-flex mt-6 bg-slate-800 hover:bg-slate-900 text-white px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali Mencari
                </a>
            </div>
        @endif
        
    </div>
</div>

@endsection
