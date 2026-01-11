@extends('user.layouts.main')
@section('container')

<div class="bg-white">
    
    <div id="default-carousel" class="relative w-full bg-black" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden md:h-screen">
            <div class="hidden md:flex absolute inset-0 z-40 bg-black/40 flex-col justify-center items-center">
                <h1 class="text-4xl text-center text-white font-semibold">
                    Sistem Informasi Pendaftaran dan Peminjaman Ruangan<br>
                    <span class="text-2xl italic">
                        Mahasiswa Fakultas Ilmu Komputer<br>
                        Universitas Pembangunan Nasional "Veteran" Jakarta
                    </span>
                </h1>
                <div class="flex flex-col justify-center mt-10 gap-y-3">
                    <a href="/panduan" class="bg-orange-600 hover:bg-orange-700 py-2 px-4 text-lg text-center text-white font-semibold rounded-sm hover:scale-105 transition ease-in-out duration-300">Ajukan Peminjaman</a>
                    <a href="/peminjaman-ruangan" class="bg-orange-600 hover:bg-orange-700 py-2 px-4 text-lg text-center text-white font-semibold rounded-sm hover:scale-105 transition ease-in-out duration-300">Syarat dan Ketentuan</a>
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
        <div class="relative flex flex-col md:flex-row w-full justify-center items-center gap-y-5 md:gap-y-0">
            <div class="w-full md:w-3/5">
                <h1 class="text-3xl font-bold">Tentang <span class="text-orange-600">K</span>ami</h1>
                <p class="font-semibold"><span class="text-2xl text-orange-600 font-bold">BookingSpace</span> merupakan sistem informasi yang dirancang untuk mempermudah proses pendaftaran dan peminjaman ruangan bagi mahasiswa Fakultas Ilmu Komputer Universitas Pembangunan Nasional “Veteran” Jakarta. Melalui platform ini, pengguna dapat mengakses informasi ketersediaan ruangan secara real-time, melakukan pemesanan dengan mudah, serta memantau status peminjaman secara transparan dan efisien.</p>
            </div>
            <div class="w-full md:w-2/5 -mb-20 flex justify-center items-center">
                <img class=" h-[30rem] rounded-md shadow-md z-30" src="{{ asset('img/background/mockup-tentang-kami.png') }}">
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center px-20 pt-10 pb-10 mt-10">

        <h1 class="text-3xl text-orange-600 font-extrabold font-raleway">Ruangan Terbaik</h1>

        <div class="mt-5 grid grid-cols-1 md:grid-cols-4 gap-10 justify-items-center">
            <div class="border-t-2 pt-2 border-gray-600 hover:border-orange-600 transition">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body items-center text-center text-gray-900 p-4">
                        <h2 class="card-title text-xl font-semibold">Ruang Rapat</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <a href="#" class="bg-orange-600 mt-2 px-3 py-1 rounded text-white hover:bg-orange-700 transition">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="border-t-2 pt-2 border-gray-600 hover:border-orange-600 transition">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body items-center text-center text-gray-900 p-4">
                        <h2 class="card-title text-xl font-semibold">Laboratorium Komputer</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <a href="#" class="bg-orange-600 mt-2 px-3 py-1 rounded text-white hover:bg-orange-700 transition">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="border-t-2 pt-2 border-gray-600 hover:border-orange-600 transition">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body items-center text-center text-gray-900 p-4">
                        <h2 class="card-title text-xl font-semibold">Ruang Sidang</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <a href="#" class="bg-orange-600 mt-2 px-3 py-1 rounded text-white hover:bg-orange-700 transition">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="border-t-2 pt-2 border-gray-600 hover:border-orange-600 transition">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body items-center text-center text-gray-900 p-4">
                        <h2 class="card-title text-xl font-semibold">Ruang Aula</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <a href="#" class="bg-orange-600 mt-2 px-3 py-1 rounded text-white hover:bg-orange-700 transition">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="relative flex justify-center items-center px-20 py-16 bg-cover bg-center h-screen" 
        style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative flex w-full justify-center items-center">
            <div class="w-2/5 flex flex-col justify-center items-center">
                <img class="w-1/2" src="{{ asset('img/icon/Bs.png') }}">
            </div>
            <div class="w-3/5">
                <h1 class="text-3xl font-bold"><span class="text-orange-600">V</span>isi</h1>
                <p class="font-semibold">Mewujudkan sistem informasi yang efisien, transparan, dan terintegrasi dalam mendukung kegiatan akademik serta pengelolaan fasilitas Fakultas Ilmu Komputer UPN "Veteran" Jakarta.</p>
                <h1 class="text-3xl font-bold mt-3"><span class="text-orange-600">M</span>isi</h1>
                <div class="flex justify-start gap-x-3">
                    <i class="fa-solid fa-circle-nodes text-xl text-orange-400 font-bold"></i>
                    <p class="font-semibold"> Menyediakan layanan digital yang memudahkan mahasiswa, dosen, dan tenaga kependidikan dalam proses pendaftaran serta peminjaman ruangan secara cepat dan akurat.</p>
                </div>
                <div class="flex justify-start gap-x-3">
                    <i class="fa-solid fa-circle-nodes text-xl text-orange-400 font-bold"></i>
                    <p class="font-semibold"> Meningkatkan transparansi dan akuntabilitas dalam pengelolaan penggunaan ruangan fakultas.</p>
                </div>
                <div class="flex justify-start gap-x-3">
                    <i class="fa-solid fa-circle-nodes text-xl text-orange-400 font-bold"></i>
                    <p class="font-semibold"> Mengoptimalkan pemanfaatan teknologi informasi untuk mendukung tata kelola administrasi akademik yang modern dan berkelanjutan.</p>
                </div>
                <div class="flex justify-start gap-x-3">
                    <i class="fa-solid fa-circle-nodes text-xl text-orange-400 font-bold"></i>
                    <p class="font-semibold"> Mendukung kegiatan akademik dan non-akademik melalui sistem yang dapat diakses kapan saja dan di mana saja.</p>
                </div>
                <div class="flex justify-start gap-x-3">
                    <i class="fa-solid fa-circle-nodes text-xl text-orange-400 font-bold"></i>
                    <p class="font-semibold"> Mendukung kegiatan akademik dan non-akademik melalui sistem yang dapat diakses kapan saja dan di mana saja.</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection