@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
    <div class="container mx-auto p-4 border-gray-200 min-h-screen">

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
            <a href="{{ route('room.setting.room', [$room->url, $room->id]) }}" class="hover:underline">
                Detail Ruangan
            </a>
            <span class="mx-2">/</span>
            <span class="text-orange-600 font-medium">
                Edit
            </span>
        </div>

        <div class="mb-6">
            <h1 class="text-xl font-bold text-orange-600">
                Setting Ruangan
            </h1>
            <p class="text-sm text-gray-500">
                {{ $room->type }} – {{ $room->name }}
            </p>
        </div>

        <form action="{{ route('room.setting.update', [$room->url, $room->id]) }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-lg shadow p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama Ruangan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Nama Ruangan
                </label>
                <input type="text"
                    value="{{ $room->name }}"
                    class="mt-1 w-full rounded border-gray-300 bg-gray-100 text-black"
                    disabled>
            </div>

            {{-- Tipe Ruangan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Tipe Ruangan
                </label>
                <input type="text"
                    value="{{ $room->type }}"
                    class="mt-1 w-full rounded border-gray-300 bg-gray-100 text-black"
                    disabled>
            </div>

            {{-- Kapasitas --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Kapasitas
                </label>
                <input type="number"
                    name="capacity"
                    value="{{ $room->capacity }}"
                    class="mt-1 w-full rounded border-gray-300 text-black">
            </div>

            {{-- Fasilitas --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Fasilitas
                </label>
                <textarea name="facilities" rows="3"
                    class="mt-1 w-full rounded border-gray-300 text-black"
                    placeholder="Contoh: Komputer, AC, Proyektor">{{ old('facilities', $room->facilities) }}</textarea>
            </div>

            {{-- Hari Operasional --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Hari Operasional Mulai
                    </label>
                    <select name="day_start"
                            class="mt-1 w-full rounded border-gray-300 text-black">
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                            <option value="{{ $day }}"
                                {{ $dayStart === $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Hari Operasional Tutup
                    </label>
                    <select name="day_end"
                            class="mt-1 w-full rounded border-gray-300 text-black">
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                            <option value="{{ $day }}"
                                {{ $dayEnd === $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- Jam Operasional --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Jam Operasional Mulai
                    </label>
                    <input type="time"
                        name="borrow_time_start"
                        value="{{ $room->borrow_time_start ?? '' }}"
                        class="mt-1 w-full rounded border-gray-300 text-black">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Jam Operasional Tutup
                    </label>
                    <input type="time"
                        name="borrow_time_end"
                        value="{{ $room->borrow_time_end ?? '' }}"
                        class="mt-1 w-full rounded border-gray-300 text-black">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Deskripsi
                </label>
                <textarea name="description" rows="4"
                    class="mt-1 w-full rounded border-gray-300 text-black"
                    placeholder="Deskripsi ruangan">{{ old('description', $room->description) }}</textarea>
            </div>

            {{-- Gambar --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Gambar Ruangan
                </label>

                <div class="border rounded-md w-48">
                    @if($room->image)
                        <img src="{{ asset($room->image) }}"
                            class="w-48 mb-3 rounded shadow">
                    @endif

                    <input type="file"
                        name="image"
                        class="w-full text-sm text-gray-700
                            file:mr-4 file:py-2 file:px-4
                            file:rounded file:border-0
                            file:text-sm file:font-semibold
                            file:bg-orange-50 file:text-orange-700
                            hover:file:bg-orange-100">
                </div>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Status Ruangan
                </label>
                <select name="is_active"
                        class="mt-1 w-full rounded border-gray-300 text-black">
                    <option value="1" {{ $room->is_active ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="0" {{ !$room->is_active ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>
                </select>
            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('room.setting.index', $room->url) }}"
                   class="px-4 py-2 text-black bg-gray-200 rounded hover:bg-gray-300">
                    Kembali
                </a>

                <button class="px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
