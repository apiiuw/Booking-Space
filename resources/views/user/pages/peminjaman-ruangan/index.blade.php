@extends('user.layouts.main')
@section('container')

<div class="h-full bg-white">
    <div class="relative flex justify-end items-center pr-20 pt-32 bg-cover bg-center h-[40vh]" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20 "></div>
        <h1 class="relative h-1/2 font-raleway font-extrabold text-4xl text-orange-600">Peminjaman Ruangan</h1>
    </div>

    <div class="min-h-screen px-20">
        <h1 class="text-orange-600 text-2xl font-raleway font-bold pt-10 pb-5">Tipe Ruangan</h1>
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
                            <h2 class="card-title text-xl font-semibold">Ruang Rapat</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Ruangan yang dilengkapi dengan meja konferensi, proyektor, dan fasilitas presentasi. Cocok untuk kegiatan rapat dosen, pertemuan organisasi, atau diskusi kelompok kecil.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'rapat']) }}" class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Pilih Ruangan
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
                            <h2 class="card-title text-xl font-semibold">Laboratorium Komputer</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Dilengkapi dengan perangkat komputer, jaringan internet, dan software pendukung pembelajaran. Ideal digunakan untuk praktikum, pelatihan, atau ujian berbasis komputer.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'laboratorium-komputer']) }}" class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Pilih Ruangan
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
                            <h2 class="card-title text-xl font-semibold">Ruang Sidang</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Ruangan formal yang dirancang untuk kegiatan sidang akademik seperti seminar hasil, sidang skripsi, dan presentasi resmi lainnya dengan kapasitas menengah.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'sidang']) }}" class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Pilih Ruangan
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
                            <h2 class="card-title text-xl font-semibold">Ruang Aula</h2>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">
                                Ruangan berkapasitas besar dengan tata letak fleksibel, cocok untuk kegiatan seminar, workshop, atau acara fakultas yang melibatkan banyak peserta.
                            </p>
                        </div>
                        <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'aula']) }}" class="bg-orange-600 mt-4 px-3 py-1 rounded text-white hover:bg-orange-700 transition">
                            Pilih Ruangan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection