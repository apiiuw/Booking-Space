@extends('user.layouts.main')
@section('container')

<div class="bg-white">

    <div id="default-carousel" class="relative w-full bg-black" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[28rem] overflow-hidden md:h-screen">
            <div class="absolute inset-0 z-40 bg-black/50 flex flex-col justify-center items-center px-5">
                <h1 class="text-xl md:text-4xl text-center text-white font-semibold leading-tight">
                    Sistem Informasi Pendaftaran dan Peminjaman Ruangan<br>
                    <span class="text-sm md:text-2xl italic block mt-2">
                        Mahasiswa Fakultas Ilmu Komputer<br>
                        Universitas Pembangunan Nasional "Veteran" Jakarta
                    </span>
                </h1>
                <div class="flex flex-col sm:flex-row justify-center mt-8 gap-3">
                    <a href="/peminjaman-ruangan" class="bg-orange-600 hover:bg-orange-700 py-2 px-6 text-sm md:text-lg text-center text-white font-semibold rounded-sm hover:scale-105 transition ease-in-out duration-300">Ajukan Peminjaman</a>
                    <a href="/panduan" class="bg-orange-600 hover:bg-orange-700 py-2 px-6 text-sm md:text-lg text-center text-white font-semibold rounded-sm hover:scale-105 transition ease-in-out duration-300">Syarat dan Ketentuan</a>
                </div>
            </div>
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carousel/carousel-5.png') }}"
                    class="w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carousel/carousel-6.png') }}"
                    class="w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carousel/carousel-3.jpeg') }}"
                    class="w-full h-full object-cover"
                    alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carousel/carousel-4.jpg') }}"
                    class="w-full h-full object-cover"
                    alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-40 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full group-focus:outline-none">
                <svg class="w-4 h-4 text-orange-600 hover:text-orange-700 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-40 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full group-focus:outline-none">
                <svg class="w-4 h-4 text-orange-600 hover:text-orange-700 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="relative flex justify-center items-center px-10 md:px-20 py-16 bg-cover bg-center h-full md:h-[30rem]"
        style="background-image: url('{{ asset('img/background/bg-tentang-kami.png') }}');">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative flex flex-col md:flex-row w-full justify-center items-center gap-y-8 md:gap-y-0">
            <div class="w-full md:w-3/5 text-center md:text-left">
                <h1 class="text-2xl md:text-3xl font-bold text-white">Tentang <span class="text-orange-600">K</span>ami</h1>
                <p class="font-semibold text-white text-sm md:text-base mt-4 leading-relaxed"><span class="text-xl md:text-2xl text-orange-600 font-bold">BookingSpace</span> merupakan sistem informasi yang dirancang untuk mempermudah proses pendaftaran dan peminjaman ruangan bagi mahasiswa Fakultas Ilmu Komputer Universitas Pembangunan Nasional “Veteran” Jakarta. Melalui platform ini, pengguna dapat mengakses informasi ketersediaan ruangan secara real-time, melakukan pemesanan dengan mudah, serta memantau status peminjaman secara transparan dan efisien.</p>
            </div>
            <div class="w-full md:w-2/5 flex justify-center items-center">
                <img class="h-64 md:h-[30rem] rounded-md shadow-md z-30 object-cover" src="{{ asset('img/background/mockup-tentang-kami.png') }}">
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center px-6 md:px-20 pt-16 pb-20 relative overflow-hidden">
        <div class="border-b border-slate-200/80 pb-6 mb-10 flex flex-col md:flex-row md:items-end justify-between">
            <div>
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Rekomendasi</span>
                <h1 class="text-3xl text-slate-800 font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Ruangan Terbaik
                </h1>
                <p class="text-slate-500 text-xs md:text-sm mt-2">Daftar tipe ruangan terpopuler yang siap menunjang berbagai kegiatan Anda di FIK UPNVJ.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1: Ruang Rapat -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Rapat" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang Rapat</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Ruang pertemuan representatif untuk diskusi kelompok, rapat dosen, dan rapat koordinasi organisasi.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'rapat']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Lihat Selengkapnya
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Lab Komputer -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Laboratorium Komputer" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-desktop"></i>
                            </span>
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Lab Komputer</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Fasilitas laboratorium dengan puluhan unit komputer berspesifikasi tinggi dan internet berkecepatan tinggi.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'laboratorium-komputer']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Lihat Selengkapnya
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Ruang Sidang -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Sidang" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-scroll"></i>
                            </span>
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang Sidang</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Ruangan formal dengan tata letak representatif untuk ujian sidang skripsi, seminar proposal, dan forum resmi.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'sidang']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Lihat Selengkapnya
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Ruang Aula -->
            <div class="group bg-white rounded-[32px] border border-slate-100 hover:border-orange-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col overflow-hidden h-full transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Ruang Aula" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-10 h-10 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-sm font-bold shadow-inner group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <i class="fa-solid fa-landmark"></i>
                            </span>
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-orange-600 transition-colors">Ruang Aula</h3>
                        </div>
                        <p class="text-xs md:text-sm text-slate-500 leading-relaxed font-medium line-clamp-3">
                            Gedung aula serbaguna berkapasitas besar untuk menyelenggarakan seminar, lokakarya, dan pelantikan organisasi.
                        </p>
                    </div>
                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'aula']) }}" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3 px-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                            Lihat Selengkapnya
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex justify-center items-center px-10 md:px-20 py-16 bg-cover bg-center h-full"
        style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative flex flex-col md:flex-row w-full justify-center items-center gap-10">
            <div class="w-full md:w-2/5 flex flex-col justify-center items-center">
                <img class="w-1/2 md:w-full max-w-[200px] md:max-w-none" src="{{ asset('img/icon/Bs.png') }}">
            </div>
            <div class="w-full md:w-3/5 text-center md:text-left">
                <h1 class="text-2xl md:text-3xl font-bold text-white"><span class="text-orange-600">V</span>isi</h1>
                <p class="font-semibold text-white text-sm md:text-base mb-6">Mewujudkan sistem informasi yang efisien, transparan, dan terintegrasi dalam mendukung kegiatan akademik serta pengelolaan fasilitas Fakultas Ilmu Komputer UPN "Veteran" Jakarta.</p>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-4"><span class="text-orange-600">M</span>isi</h1>
                <div class="flex items-start gap-x-3 mb-3">
                    <i class="fa-solid fa-circle-nodes text-lg md:text-xl text-orange-400 font-bold mt-1"></i>
                    <p class="font-semibold text-white text-sm md:text-base text-left"> Menyediakan layanan digital yang memudahkan mahasiswa, dosen, dan tenaga kependidikan dalam proses pendaftaran serta peminjaman ruangan secara cepat dan akurat.</p>
                </div>
                <div class="flex items-start gap-x-3 mb-3">
                    <i class="fa-solid fa-circle-nodes text-lg md:text-xl text-orange-400 font-bold mt-1"></i>
                    <p class="font-semibold text-white text-sm md:text-base text-left"> Meningkatkan transparansi dan akuntabilitas dalam pengelolaan penggunaan ruangan fakultas.</p>
                </div>
                <div class="flex items-start gap-x-3 mb-3">
                    <i class="fa-solid fa-circle-nodes text-lg md:text-xl text-orange-400 font-bold mt-1"></i>
                    <p class="font-semibold text-white text-sm md:text-base text-left"> Mengoptimalkan pemanfaatan teknologi informasi untuk mendukung tata kelola administrasi akademik yang modern dan berkelanjutan.</p>
                </div>
                <div class="flex items-start gap-x-3 mb-3">
                    <i class="fa-solid fa-circle-nodes text-lg md:text-xl text-orange-400 font-bold mt-1"></i>
                    <p class="font-semibold text-white text-sm md:text-base text-left"> Mendukung kegiatan akademik dan non-akademik melalui sistem yang dapat diakses kapan saja dan di mana saja.</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
