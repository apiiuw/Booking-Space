@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-gray-200 min-h-screen">

        {{-- Breadcrumb --}}
        <div class="mb-4 text-sm text-gray-500">
            <a href="{{ route('room.setting.index') }}" class="hover:underline">
                Pengaturan Ruangan
            </a>
            <span class="mx-2">/</span>
            <span class="text-orange-600 font-medium">
                Tipe Ruangan
            </span>
        </div>

        <h2 class="text-orange-600 font-bold text-2xl">
            Tipe Ruangan
        </h2>

        <h3 class="text-orange-600 text-md mb-4">
            Daftar Ruangan {{ $roomType->type }}
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @foreach ($rooms as $room)
                <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-orange-100 p-4">

                    <h5 class="text-lg font-bold text-gray-900 mb-1">
                        {{ $room->name }}
                    </h5>

                    <p class="text-sm text-gray-700 mb-1">
                        Kapasitas: <strong>{{ $room->capacity }} Orang</strong>
                    </p>

                    <p class="text-sm text-gray-700 mb-3">
                        {{ $room->borrow_days }} <br>
                        {{ substr($room->borrow_time_start,0,5) }} -
                        {{ substr($room->borrow_time_end,0,5) }}
                    </p>

                    <a href="{{ route('room.setting.room', [$room->url, $room->id]) }}"
                       class="inline-block text-sm text-white bg-orange-600 hover:bg-orange-700 px-3 py-1 rounded">
                        Lihat Detail
                    </a>
                </div>
            @endforeach

        </div>

    </div>
</div>

@endsection
