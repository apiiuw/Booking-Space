@extends('admin.layouts.main')

@section('container')
<div class="p-4 sm:ml-64 min-h-screen">

    <div class="flex items-center gap-4 mb-3">
        <!-- TOMBOL KEMBALI -->
        <a href="{{ route('room.availability.room', [
                'type' => $type,
                'roomNumber' => $roomNumber
            ]) }}"
            class="inline-flex items-center gap-2 px-3 py-2
                bg-orange-100 hover:bg-orange-200 text-gray-700
                rounded-lg transition">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>

            Kembali
        </a>

        <!-- JUDUL -->
        <h1 class="text-2xl font-bold text-orange-600 pt-1">
            Detail Jadwal {{ $roomName }} {{ $roomNumber }}
        </h1>
    </div>


    <p class="mt-2 text-gray-700">
        Tanggal:
        <b>{{ $selectedDate->translatedFormat('d F Y') }}</b>
    </p>

    <div class="ml-10">
        <hr class="py-6">

        <!-- TIMELINE -->
        <div class="relative border-l-2 border-gray-300 pl-8 space-y-8">

            @foreach ($timeline as $slot)
                @php
                    $isBooked = $slot['type'] === 'booked';
                @endphp

                <div class="relative">
                    <!-- DOT -->
                    <div class="absolute -left-[9px] top-2 w-4 h-4 rounded-full
                        {{ $isBooked ? 'bg-yellow-500' : 'bg-green-500' }}">
                    </div>

                    <!-- WAKTU -->
                    <div class="absolute -left-20 top-1 text-sm font-semibold text-gray-600">
                        {{ $slot['start'] }}
                    </div>

                    <!-- CARD -->
                    @if ($isBooked)
                        <div class="bg-white border border-yellow-300 shadow-sm rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-semibold text-yellow-700">
                                        {{ $slot['start'] }} – {{ $slot['end'] }} (TERPAKAI)
                                    </p>

                                    <p class="text-sm text-gray-800 mt-1">
                                        {{ $slot['data']->nama_penanggung_jawab }}
                                    </p>

                                    <p class="text-xs text-gray-600">
                                        {{ $slot['data']->instansi }}
                                    </p>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Keperluan: {{ $slot['data']->keperluan }}
                                    </p>

                                </div>

                                <span class="text-xs px-3 py-1 rounded-full
                                    @if ($slot['data']->status === 'disetujui')
                                        bg-green-100 text-green-700
                                    @elseif ($slot['data']->status === 'menunggu')
                                        bg-yellow-100 text-yellow-700
                                    @else
                                        bg-red-100 text-red-700
                                    @endif
                                ">
                                    {{ ucfirst($slot['data']->status) }}
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                            <p class="text-green-700 font-semibold">
                                {{ $slot['start'] }} – {{ $slot['end'] }} (TERSEDIA)
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                Durasi: {{ floor($slot['duration'] / 60) }} jam
                            </p>
                        </div>
                    @endif
                </div>
            @endforeach

        </div>

    </div>

</div>
@endsection
