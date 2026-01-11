@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-gray-200 h-screen">
      <h2 class="text-orange-600 font-bold text-2xl">Pengaturan Ruangan</h2>
      <h3 class="text-orange-600 text-md mb-3">Pilihlah tipe ruangan yang ingin dilakukan pengaturan!</h3>

      <div class="flex justify-end mb-4">
         <a href="{{ route('room.setting.create') }}"
            class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-md text-sm font-medium">
            + Tambah Tipe Ruangan
         </a>
      </div>

      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
         @foreach ($roomTypes as $item)
            <div
                  class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-lg hover:bg-orange-100">

                  <img
                     class="object-contain w-full rounded-t-lg h-full md:w-48 md:rounded-none md:rounded-s-lg"
                     src="{{ asset($item->image) }}"
                     alt="{{ $item->type }}">

                  <div class="flex flex-col justify-center items-start ps-5 leading-normal">
                     <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900">
                        {{ $item->type }}
                     </h5>

                     <p class="mb-2 text-sm font-normal tracking-tight text-gray-900">
                        Pilih pengaturan untuk tipe ruangan {{ strtolower($item->type) }}.
                     </p>

                     <a href="{{ route('room.setting.room-number', $item->url) }}"
                        class="font-normal text-md text-white bg-orange-600 hover:bg-orange-700 px-2 py-1 rounded-sm">
                        Pilih Ruangan
                     </a>
                  </div>
            </div>
         @endforeach
      </div>

   </div>
</div>

@endsection