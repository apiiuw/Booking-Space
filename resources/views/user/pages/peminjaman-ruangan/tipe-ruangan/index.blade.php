@extends('user.layouts.main')
@section('container')

<div class="h-full bg-white">
    <div class="relative flex justify-end items-center pr-20 pt-32 bg-cover bg-center h-[40vh]" 
        style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20"></div>

        <a href="{{ url()->previous() }}" 
        class="absolute flex justify-center items-center top-1/2 left-5 bg-orange-600 text-white rounded-full py-3 px-5 hover:bg-orange-700 transition duration-300 shadow-lg">
            <i class="fa-solid fa-angles-left"></i>
            <p class="ml-2 pt-0.5">Kembali</p>
        </a>

        <h1 class="relative h-1/2 font-raleway font-extrabold text-4xl text-orange-600">
            {{ ucwords(str_replace('-', ' ', $tipe)) }}
        </h1>

    </div>

    <div class="min-h-screen px-20">
        <h1 class="text-orange-600 text-2xl font-raleway font-bold pt-10 pb-2">Pilihan Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }}</h1>
        <p class="text-gray-700 pb-5">Berikut pilihan ruang {{ (str_replace('-', ' ', $tipe)) }} yang tersedia di Fakultas Ilmu Komputer UPN “Veteran” Jakarta.</p>
        <hr>

        <div class="mt-5 grid grid-cols-1 md:grid-cols-4 gap-10 justify-items-center">
            <!-- Card 1 -->
            <div class="border-t-2 pt-2 border-gray-300 hover:border-orange-600 transition h-full">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300 flex flex-col h-full">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body flex flex-col justify-between text-center text-gray-900 p-4 flex-1">
                        <div class="flex flex-col items-center">
                            <h2 class="card-title text-xl font-semibold">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} 101</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Ruang rapat kecil berkapasitas 8-10 orang, cocok untuk rapat dosen atau diskusi kelompok dengan fasilitas layar proyektor dan AC.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 101
                            ]) }}"
                            class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Detail Ruangan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="border-t-2 pt-2 border-gray-300 hover:border-orange-600 transition h-full">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300 flex flex-col h-full">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body flex flex-col justify-between text-center text-gray-900 p-4 flex-1">
                        <div class="flex flex-col items-center">
                            <h2 class="card-title text-xl font-semibold">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} 102</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Dilengkapi meja panjang, papan tulis, dan koneksi Wi-Fi cepat, ruang ini ideal untuk pertemuan internal skala menengah.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 102
                            ]) }}"
                            class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Detail Ruangan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="border-t-2 pt-2 border-gray-300 hover:border-orange-600 transition h-full">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300 flex flex-col h-full">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body flex flex-col justify-between text-center text-gray-900 p-4 flex-1">
                        <div class="flex flex-col items-center">
                            <h2 class="card-title text-xl font-semibold">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} 103</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Memiliki pencahayaan alami dan tata letak fleksibel, cocok untuk kegiatan brainstorming atau pelatihan kecil.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 103
                            ]) }}"
                            class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Detail Ruangan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="border-t-2 pt-2 border-gray-300 hover:border-orange-600 transition h-full">
                <div class="card bg-white rounded-xl border-2 border-gray-600 hover:border-orange-600 w-80 shadow-lg transition ease-in-out duration-300 flex flex-col h-full">
                    <figure>
                        <img src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover rounded-t-xl" />
                    </figure>
                    <div class="card-body flex flex-col justify-between text-center text-gray-900 p-4 flex-1">
                        <div class="flex flex-col items-center">
                            <h2 class="card-title text-xl font-semibold">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} 104</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Ruang rapat besar berkapasitas hingga 20 orang, dilengkapi sistem audio, proyektor, dan area coffee break di dalam ruangan.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.detail', [
                                'tipe' => $tipe,
                                'ruangan' => 104
                            ]) }}"
                            class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Detail Ruangan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


</div>

@endsection