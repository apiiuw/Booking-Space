@extends('user.layouts.main')
@section('container')

<div class="relative min-h-screen bg-slate-50 pb-24 overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-5%] right-[-5%] w-[45rem] h-[45rem] bg-gradient-to-br from-orange-200/30 to-amber-150/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-10%] w-[35rem] h-[35rem] bg-gradient-to-tr from-orange-100/20 to-amber-100/30 rounded-full blur-3xl -z-10"></div>
    <div class="absolute top-[40%] left-[20%] w-[25rem] h-[25rem] bg-orange-200/10 rounded-full blur-3xl -z-10 animate-bounce" style="animation-duration: 12s;"></div>

    <!-- Hero Banner Section -->
    <div class="relative flex justify-start items-center px-6 md:px-20 pt-36 bg-cover bg-center h-[42vh] md:h-[48vh] shadow-lg rounded-b-[40px] overflow-hidden" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <!-- Premium gradient overlays -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-900/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-transparent to-transparent"></div>
        
        <!-- Modern Grid Pattern overlay -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #000 10%, transparent 11%); background-size: 20px 20px;"></div>
        
        <!-- Premium Floating Banner Card -->
        <div class="relative z-10 bg-white/90 backdrop-blur-xl border border-white/60 p-6 md:p-8 rounded-3xl shadow-[0_20px_50px_rgba(249,115,22,0.15)] max-w-2xl transform hover:scale-[1.01] transition duration-300">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-widest mb-3 shadow-sm">
                <span class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-1.5 animate-ping"></span>
                Fakultas Ilmu Komputer
            </span>
            <h1 class="font-black text-3xl md:text-4xl text-slate-800 leading-tight tracking-tight">Peminjaman Ruangan</h1>
            <p class="text-slate-600 text-xs md:text-sm mt-3 leading-relaxed font-medium">Ajukan izin peminjaman ruangan dengan cepat, praktis, dan transparan untuk mendukung kegiatan akademik, seminar, maupun organisasi kemahasiswaan Anda.</p>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 mt-12 relative">
        
        <!-- Fitur Cari Ruangan Kosong -->
        <div class="bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] mb-12 relative overflow-hidden z-20 transform hover:-translate-y-1 transition duration-300">
            <div class="absolute right-0 top-0 w-32 h-32 bg-gradient-to-bl from-orange-100/50 to-transparent rounded-bl-full -z-10"></div>
            
            <div class="mb-6">
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Temukan Ruangan</span>
                <h2 class="text-slate-800 text-2xl font-black flex items-center mt-1">
                    <i class="fa-solid fa-magnifying-glass text-orange-500 mr-3"></i>
                    Cari Ruangan Kosong
                </h2>
                <p class="text-slate-500 text-xs mt-2">Masukkan jadwal yang Anda inginkan, kami akan mencarikan ruangan yang tersedia.</p>
            </div>

            <form action="{{ route('peminjamanRuangan.search') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal" required min="{{ date('Y-m-d') }}" class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 font-medium bg-slate-50">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Waktu Mulai</label>
                    <select name="waktu_mulai" required class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 font-semibold bg-slate-50">
                        <option value="" disabled selected>Pilih Jam Mulai</option>
                        @for($h=7; $h<=17; $h++)
                            @foreach(['00', '30'] as $m)
                                @if($h==17 && $m=='30') @continue @endif
                                <option value="{{ str_pad($h, 2, '0', STR_PAD_LEFT).':'.$m }}">{{ str_pad($h, 2, '0', STR_PAD_LEFT).':'.$m }}</option>
                            @endforeach
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Waktu Selesai</label>
                    <select name="waktu_selesai" required class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 font-semibold bg-slate-50">
                        <option value="" disabled selected>Pilih Jam Selesai</option>
                        @for($h=7; $h<=17; $h++)
                            @foreach(['00', '30'] as $m)
                                @if($h==17 && $m=='30') @continue @endif
                                <option value="{{ str_pad($h, 2, '0', STR_PAD_LEFT).':'.$m }}">{{ str_pad($h, 2, '0', STR_PAD_LEFT).':'.$m }}</option>
                            @endforeach
                        @endfor
                    </select>
                </div>
                <div>
                    <button type="submit" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                        <i class="fa-solid fa-search mr-2"></i>
                        Cari Ruangan
                    </button>
                </div>
            </form>
        </div>
        <div class="flex flex-col md:flex-row md:items-end justify-between border-b border-slate-200/80 pb-6">
            <div>
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Katalog Ruang</span>
                <h2 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Tipe Ruangan
                </h2>
                <p class="text-slate-500 text-xs md:text-sm mt-2">Pilih kategori ruangan yang Anda butuhkan di lingkungan FIK UPNVJ</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center gap-3">
                <span class="inline-flex items-center px-4 py-2 rounded-2xl text-xs font-bold bg-white text-emerald-700 border border-slate-200 shadow-sm">
                    <span class="w-2.5 h-2.5 mr-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    Sistem Reservasi Aktif
                </span>
            </div>
        </div>

        <!-- Room Cards Grid -->
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1: Rapat -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Kapasitas Kecil-Sedang
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang Rapat</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Dilengkapi meja konferensi, proyektor, dan AC. Cocok untuk kegiatan diskusi kecil, rapat kepengurusan, dan koordinasi internal.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'rapat']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Lab Komputer -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        PC & Internet
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-desktop"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Lab Komputer</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Dilengkapi dengan komputer spesifikasi tinggi untuk menunjang praktikum, ujian berbasis komputer, serta pelatihan software.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'laboratorium-komputer']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Sidang -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Kapasitas Menengah
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-scroll"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang Sidang</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Format tata letak formal yang ideal untuk presentasi ujian tugas akhir, seminar proposal, hingga diskusi akademis resmi.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'sidang']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Aula -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-[10px] font-extrabold text-slate-700 shadow-md border border-slate-100 uppercase tracking-wider">
                        Kapasitas Besar
                    </div>
                </div>
                <div class="flex-1 p-6 md:p-7 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-landmark"></i>
                            </span>
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang Aula</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Ruangan luas untuk acara akbar seperti seminar nasional, pelantikan kepengurusan, lokakarya, atau pameran karya mahasiswa.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'aula']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Pilih Ruangan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection