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

        <a href="{{ route('peminjamanRuangan') }}" 
            class="absolute top-8 left-6 md:left-20 flex items-center bg-white/95 hover:bg-white active:scale-95 text-slate-800 backdrop-blur-md border border-slate-200/50 rounded-2xl py-2.5 px-4.5 transition duration-300 shadow-md hover:shadow-lg text-xs font-bold z-20">
            <i class="fa-solid fa-arrow-left mr-2 text-orange-600"></i>
            Kembali
        </a>

        <div class="relative z-10 bg-white/90 backdrop-blur-xl border border-white/60 p-6 md:p-8 rounded-3xl shadow-[0_20px_50px_rgba(249,115,22,0.15)] max-w-2xl mt-8 md:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-widest mb-3">
                Kategori Ruang
            </span>
            <h1 class="font-black text-3xl md:text-4xl text-slate-800 leading-tight tracking-tight">
                {{ ucwords(str_replace('-', ' ', $tipe)) }}
            </h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 mt-12 relative">
        <div class="border-b border-slate-200/80 pb-6">
            <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Daftar Pilihan</span>
            <h2 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                Pilihan Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }}
            </h2>
            <p class="text-slate-500 text-xs md:text-sm mt-2">Berikut pilihan ruang {{ (str_replace('-', ' ', $tipe)) }} yang tersedia di Fakultas Ilmu Komputer UPN “Veteran” Jakarta.</p>
        </div>

        <!-- Room Cards Grid -->
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Ruang 101
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-door-open"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang 101</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Ruang rapat kecil berkapasitas 8-10 orang, cocok untuk rapat dosen atau diskusi kelompok dengan fasilitas layar proyektor dan AC.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 101
                            ]) }}"
                            class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Detail Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Ruang 102
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-door-open"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang 102</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Dilengkapi meja panjang, papan tulis, dan koneksi Wi-Fi cepat, ruang ini ideal untuk pertemuan internal skala menengah.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 102
                            ]) }}"
                            class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Detail Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Ruang 103
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-door-open"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang 103</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Memiliki pencahayaan alami dan tata letak fleksibel, cocok untuk kegiatan brainstorming atau pelatihan kecil.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 103
                            ]) }}"
                            class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Detail Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Ruang 104
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-door-open"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang 104</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Ruang rapat besar berkapasitas hingga 20 orang, dilengkapi sistem audio, proyektor, dan area coffee break di dalam ruangan.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 104
                            ]) }}"
                            class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Detail Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection