@extends('user.layouts.main')
@section('container')

<div class="h-full min-h-screen bg-white">
    <div class="relative flex justify-end items-center pr-20 pt-32 bg-cover bg-center h-[40vh]" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20 "></div>

        <h1 class="relative h-1/2 font-raleway font-extrabold text-4xl text-orange-600">
            Panduan
        </h1>
    </div>

    <div class="relative flex justify-center items-center px-10 md:px-20 py-16 bg-cover bg-center h-full md:h-[30rem]" 
        style="background-image: url('{{ asset('img/background/bg-tentang-kami.png') }}');">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative flex flex-col md:flex-row w-full justify-center items-center gap-y-5 md:gap-y-0">
            <div class="bg-white/50 w-1/2 flex flex-col justify-center rounded-sm py-5">
                <h1 class="text-2xl text-orange-600 font-bold text-center mb-3">Syarat dan Ketentuan Peminjaman</h1>
                <h1 class="text-xl text-orange-600 font-bold text-start mb-1 px-10">Syarat Peminjaman:</h1>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Keluarga Mahasiswa Universitas Pembangunan Nasional Veteran Jakarta.</p>
                </div>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Keluarga Mahasiswa Fakultas Ilmu Komputer Universitas Pembangunan Nasional Veteran Jakarta,</p>
                </div>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Terdaftar sebagai mahasiswa aktif.</p>
                </div>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Terdaftar sebagai anggota instansi/organisasi Fakultas Ilmu Komputer Universitas Pembangunan Nasional Veteran Jakarta.</p>
                </div>

                <h1 class="text-xl text-orange-600 font-bold text-start mt-3 mb-1 px-10">Ketentuan Peminjaman:</h1>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Menjaga kebersihan ruangan.</p>
                </div>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Keluarga Mahasiswa Fakultas Ilmu Komputer Universitas Pembangunan Nasional Veteran Jakarta,</p>
                </div>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Terdaftar sebagai mahasiswa aktif.</p>
                </div>
                <div class="flex items-start px-10">
                    <svg class="w-4 h-4 text-orange-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="text-black ml-2 w-[95%]">Terdaftar sebagai anggota instansi/organisasi Fakultas Ilmu Komputer Universitas Pembangunan Nasional Veteran Jakarta.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="flex justify-center mt-3">
        <h1 class="text-3xl text-orange-600 font-bold">Syarat dan Ketentuan Peminjaman</h1>
    </div> -->
</div>

@endsection