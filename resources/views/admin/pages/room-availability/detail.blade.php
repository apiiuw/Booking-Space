@extends('admin.layouts.main')

@section('container')
<div class="p-4 sm:ml-64 min-h-screen">
    <div class="p-4">

    <h2 class="text-orange-600 font-bold text-2xl">Ketersediaan Ruangan {{$roomName}}</h2>
    <h3 class="text-orange-600 text-md mb-3">Pilihlah nomor ruangan yang ingin dilakukan pengecekan!</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card 1 -->
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-lg hover:bg-orange-100">
        <img class="object-contain w-full rounded-t-lg h-full md:w-48 md:rounded-none md:rounded-s-lg"
            src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="">
        <div class="flex flex-col justify-center items-start ps-5 leading-normal">
            <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900">{{ $roomName }} 101</h5>
            <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 101]) }}"
                class="font-normal text-md text-white bg-orange-600 hover:bg-orange-700 px-1 py-1 rounded-sm">
                Pilih Ruangan
            </a>
        </div>
        </div>

        <!-- Card 2 -->
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-lg hover:bg-orange-100">
        <img class="object-contain w-full rounded-t-lg h-full md:w-48 md:rounded-none md:rounded-s-lg"
            src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="">
        <div class="flex flex-col justify-center items-start ps-5 leading-normal">
            <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900">{{ $roomName }} 102</h5>
            <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 102]) }}"
                class="font-normal text-md text-white bg-orange-600 hover:bg-orange-700 px-1 py-1 rounded-sm">
                Pilih Ruangan
            </a>
        </div>
        </div>

        <!-- Card 3 -->
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-lg hover:bg-orange-100">
        <img class="object-contain w-full rounded-t-lg h-full md:w-48 md:rounded-none md:rounded-s-lg"
            src="{{ asset('img/carousel/carousel-3.jpeg') }}" alt="">
        <div class="flex flex-col justify-center items-start ps-5 leading-normal">
            <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900">{{ $roomName }} 103</h5>
            <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 103]) }}"
                class="font-normal text-md text-white bg-orange-600 hover:bg-orange-700 px-1 py-1 rounded-sm">
                Pilih Ruangan
            </a>
        </div>
        </div>

        <!-- Card 4 -->
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-lg hover:bg-orange-100">
        <img class="object-contain w-full rounded-t-lg h-full md:w-48 md:rounded-none md:rounded-s-lg"
            src="{{ asset('img/carousel/carousel-2.jpeg') }}" alt="">
        <div class="flex flex-col justify-center items-start ps-5 leading-normal">
            <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900">{{ $roomName }} 104</h5>
            <a href="{{ route('room.availability.room', ['type' => $type, 'roomNumber' => 104]) }}"
                class="font-normal text-md text-white bg-orange-600 hover:bg-orange-700 px-1 py-1 rounded-sm">
                Pilih Ruangan
            </a>
        </div>
        </div>

    </div>

    </div>
</div>
@endsection
