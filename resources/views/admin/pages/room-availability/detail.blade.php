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
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Informasi Jadwal &bull; {{$roomName}}</span>
                <h1 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Nomor Ruangan {{$roomName}}
                </h1>
                <p class="text-slate-500 text-xs md:text-sm mt-1">Pilihlah nomor ruangan yang ingin dilakukan pengecekan ketersediaan jadwal.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 p-5 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.06)] hover:border-orange-200/80 transition-all duration-300 flex flex-col md:flex-row gap-5 items-stretch overflow-hidden">
                <div class="md:w-48 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="{{ $roomName }} 101">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">{{ $roomName }} 101</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Ruangan {{ $roomName }} dengan nomor unit 101.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 101]) }}"
                            class="inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-5 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 p-5 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.06)] hover:border-orange-200/80 transition-all duration-300 flex flex-col md:flex-row gap-5 items-stretch overflow-hidden">
                <div class="md:w-48 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="{{ $roomName }} 102">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">{{ $roomName }} 102</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Ruangan {{ $roomName }} dengan nomor unit 102.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 102]) }}"
                            class="inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-5 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 p-5 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.06)] hover:border-orange-200/80 transition-all duration-300 flex flex-col md:flex-row gap-5 items-stretch overflow-hidden">
                <div class="md:w-48 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-3.jpeg') }}" alt="{{ $roomName }} 103">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">{{ $roomName }} 103</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Ruangan {{ $roomName }} dengan nomor unit 103.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 103]) }}"
                            class="inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-5 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 p-5 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.06)] hover:border-orange-200/80 transition-all duration-300 flex flex-col md:flex-row gap-5 items-stretch overflow-hidden">
                <div class="md:w-48 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="{{ $roomName }} 104">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">{{ $roomName }} 104</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Ruangan {{ $roomName }} dengan nomor unit 104.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 104]) }}"
                            class="inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-5 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
