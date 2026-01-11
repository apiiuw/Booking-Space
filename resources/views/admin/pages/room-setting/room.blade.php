@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-gray-200 min-h-screen">

        {{-- Breadcrumb --}}
        <div class="mb-4 text-sm text-gray-500">
            <a href="{{ route('room.setting.index', $room->url) }}" class="hover:underline">
                Pengaturan Ruangan
            </a>
            <span class="mx-2">/</span>
            <a href="{{ route('room.setting.room-number', $room->url) }}" class="hover:underline">
                Tipe Ruangan
            </a>
            <span class="mx-2">/</span>
            <span class="text-orange-600 font-medium">
                Detail Ruangan
            </span>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h1 class="text-xl text-orange-600 font-bold mb-6">
                Detail Ruangan
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama Ruangan --}}
                <div>
                    <p class="text-sm text-gray-500">Nama Ruangan</p>
                    <p class="font-medium text-gray-800">
                        {{ $room->name }}
                    </p>
                </div>

                {{-- Tipe --}}
                <div>
                    <p class="text-sm text-gray-500">Tipe</p>
                    <p class="font-medium text-gray-800 capitalize">
                        {{ $room->type }}
                    </p>
                </div>

                {{-- Kapasitas --}}
                <div>
                    <p class="text-sm text-gray-500">Kapasitas</p>
                    <p class="font-medium text-gray-800">
                        {{ $room->capacity ?? '-' }} Orang
                    </p>
                </div>

                {{-- Status --}}
                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm
                        {{ $room->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $room->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </div>

                {{-- Fasilitas --}}
                <div>
                    <p class="text-sm text-gray-500">Fasilitas</p>
                    <p class="font-medium text-gray-800">
                        {{ $room->facilities }}
                    </p>
                </div>

                {{-- Deskripsi --}}
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500">Deskripsi</p>
                    <p class="text-gray-800">
                        {{ $room->description ?? '-' }}
                    </p>
                </div>
            </div>

            {{-- Action --}}
            <div class="mt-6 flex gap-3">
                <a href="{{ route('room.setting.index', $room->url) }}"
                class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                    Kembali
                </a>

                <a href="{{ route('room.setting.edit', [$room->url, $room->id]) }}"
                class="flex items-center px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                    <i class="fa-solid fa-gear pr-2"></i>
                    <p class="pt-0.5">Edit Ruangan</p>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
