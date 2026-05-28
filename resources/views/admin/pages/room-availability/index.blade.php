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
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Informasi Jadwal</span>
                <h1 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Ketersediaan Ruangan
                </h1>
                <p class="text-slate-500 text-xs md:text-sm mt-1">Pilihlah tipe ruangan yang ingin dilakukan pengecekan jadwal ketersediaan.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 p-5 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.06)] hover:border-orange-200/80 transition-all duration-300 flex flex-col md:flex-row gap-5 items-stretch overflow-hidden">
                <div class="md:w-48 h-48 rounded-2xl overflow-hidden shrink-0">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Rapat">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">Ruang Rapat</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Tipe ruangan rapat kecil hingga sedang di lingkungan FIK UPNVJ.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.detail', ['type' => 'rapat']) }}"
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
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Lab Komputer">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">Ruang Lab Komputer</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Laboratorium komputer untuk keperluan praktikum, ujian, maupun workshop.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.detail', ['type' => 'lab-komputer']) }}"
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
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-3.jpeg') }}" alt="Ruang Sidang">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">Ruang Sidang</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Ruangan terstruktur formal untuk presentasi proposal, sidang skripsi, dll.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.detail', ['type' => 'sidang']) }}"
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
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Aula">
                </div>
                <div class="flex flex-col justify-between flex-1 py-1">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors mb-2">Ruang Aula</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">Ruang aula serbaguna luas untuk seminar nasional atau acara besar organisasi.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('room.availability.detail', 'aula') }}"
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