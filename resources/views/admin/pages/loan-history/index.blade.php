@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-gray-200 h-screen">
         <h2 class="text-orange-600 font-bold text-2xl">Riwayat Peminjaman</h2>
         <h3 class="text-orange-600 text-md mb-3">Pilihlah riwayat peminjaman yang ingin di lihat!</h3>

         {{-- FILTER & SEARCH --}}
         <form method="GET" class="bg-white p-4 rounded-lg shadow-md mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 text-black">

               <input type="text" name="search" value="{{ request('search') }}"
                  placeholder="Cari nama atau instansi..."
                  class="rounded-md border-gray-300 text-sm">

               <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                  class="rounded-md border-gray-300 text-sm">

               <div class="flex items-center gap-2">
                  <input type="time" name="waktu_mulai" value="{{ request('waktu_mulai') }}"
                     class="w-full text-center rounded-md border-gray-300 text-sm">
                  <span>-</span>
                  <input type="time" name="waktu_selesai" value="{{ request('waktu_selesai') }}"
                     class="w-full text-center rounded-md border-gray-300 text-sm">
               </div>

               <select name="tipe_ruangan" class="rounded-md border-gray-300 text-sm">
                  <option value="">Semua Ruangan</option>
                  <option value="Ruang Rapat" {{ request('tipe_ruangan')=='Ruang Rapat'?'selected':'' }}>Ruang Rapat</option>
                  <option value="Aula" {{ request('tipe_ruangan')=='Aula'?'selected':'' }}>Aula</option>
                  <option value="Laboratorium" {{ request('tipe_ruangan')=='Laboratorium'?'selected':'' }}>Laboratorium</option>
               </select>

               <div class="flex items-end gap-2">
                  <button
                     type="submit"
                     class="w-full bg-orange-600 text-white py-2 rounded-md hover:bg-orange-700 transition text-sm">
                     Terapkan Filter
                  </button>

                  <a href="{{ route('loan.history.index') }}"
                     class="w-full text-center bg-gray-200 text-gray-700 py-2 rounded-md hover:bg-gray-300 transition text-sm">
                     Reset
                  </a>
               </div>

            </div>
         </form>


         <div x-data="{ open: false, selected: null }" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full min-w-max text-sm text-left text-gray-500 whitespace-nowrap">
               <thead class="text-xs text-white uppercase bg-orange-600">
                     <tr>
                        <th scope="col" class="px-6 py-3">
                           Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Waktu Mulai
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Waktu Selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Tipe Ruangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Nama Peminjaman
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Instansi Peminjam
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Status Peminjaman
                        </th>
                        <th scope="col" class="px-6 py-3">
                           <span class="sr-only">Proses</span>
                        </th>
                     </tr>
               </thead>
               <tbody>
               @forelse ($riwayat as $item)
               <tr class="bg-white border-b hover:bg-orange-50">
                  <td class="px-6 py-4">
                     {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->translatedFormat('d F Y') }}
                  </td>

                  <td class="px-6 py-4">
                     {{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H.i') }}
                  </td>

                  <td class="px-6 py-4">
                     {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H.i') }}
                  </td>

                  <td class="px-6 py-4">
                     {{ $item->tipe_ruangan }}
                  </td>

                  <td class="px-6 py-4">
                     {{ $item->nama_penanggung_jawab }}
                  </td>

                  <td class="px-6 py-4">
                     {{ $item->instansi }}
                  </td>

                  <td class="px-6 py-4">
                     <div class="bg-gray-100 py-1 px-2 text-center rounded-md">
                        Selesai
                     </div>
                  </td>

                  <td class="px-6 py-4 text-right">
                     <button
                        @click="
                           selected = @js($item);
                           open = true
                        "
                        class="text-white rounded-md py-2 px-3 bg-orange-600 hover:bg-orange-700 transition">
                        Lihat Detail
                     </button>
                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="8" class="text-center py-6 text-gray-500">
                     Tidak ada riwayat peminjaman
                  </td>
               </tr>
               @endforelse
               </tbody>

            </table>

            {{-- ================= MODAL DETAIL RIWAYAT ================= --}}
            <div
               x-show="open"
               x-cloak
               x-transition:enter="transition ease-out duration-300"
               x-transition:enter-start="opacity-0"
               x-transition:enter-end="opacity-100"
               x-transition:leave="transition ease-in duration-200"
               x-transition:leave-start="opacity-100"
               x-transition:leave-end="opacity-0"
               class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm"
               @click.self="open = false"
            >
               <div
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                  x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                  x-transition:leave="transition ease-in duration-200"
                  x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                  x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                  class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 overflow-hidden"
               >

                  {{-- HEADER --}}
                  <div class="flex items-center justify-between px-6 py-4 bg-orange-50 border-b">
                     <h3 class="text-lg font-semibold text-orange-600">
                        Detail Riwayat Peminjaman
                     </h3>
                     <button
                        @click="open = false"
                        class="text-2xl text-gray-400 hover:text-gray-600 leading-none">
                        &times;
                     </button>
                  </div>

                  {{-- CONTENT --}}
                  <div class="p-6 max-h-[70vh] overflow-y-auto">
                     <div class="mb-6">
                        <p class="text-gray-500">Kode Peminjaman</p>
                        <p class="inline-block mt-1 px-4 py-2 rounded-lg bg-orange-100 text-orange-700 font-semibold tracking-wide">
                           <span x-text="selected?.kode_peminjaman"></span>
                        </p>
                     </div>
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 text-sm text-gray-700">

                        <div>
                           <p class="text-gray-500">Nama Penanggung Jawab</p>
                           <p class="font-medium" x-text="selected?.nama_penanggung_jawab"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Email</p>
                           <p class="font-medium" x-text="selected?.email"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Instansi</p>
                           <p class="font-medium" x-text="selected?.instansi"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Jabatan</p>
                           <p class="font-medium" x-text="selected?.jabatan"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Tipe Ruangan</p>
                           <p class="font-medium" x-text="selected?.tipe_ruangan"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Ruangan</p>
                           <p class="font-medium" x-text="selected?.ruangan"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Tanggal</p>
                           <p class="font-medium" x-text="selected?.tanggal_peminjaman"></p>
                        </div>

                        <div>
                           <p class="text-gray-500">Waktu</p>
                           <p class="font-medium">
                              <span x-text="selected?.waktu_mulai"></span>
                              –
                              <span x-text="selected?.waktu_selesai"></span>
                           </p>
                        </div>

                        <div>
                           <p class="text-gray-500">Status</p>
                           <span
                              class="inline-block mt-1 px-3 py-1 rounded-md text-sm font-medium bg-gray-100 text-gray-700">
                              Selesai
                           </span>
                        </div>

                     </div>

                     {{-- KEPERLUAN --}}
                     <div class="mt-6">
                        <p class="text-gray-500 text-sm mb-1">Keperluan</p>
                        <div class="bg-gray-50 text-gray-500 border rounded-xl p-4 text-sm leading-relaxed">
                           <span x-text="selected?.keperluan"></span>
                        </div>
                     </div>
                  </div>

                  {{-- FOOTER --}}
                  <div class="flex justify-end px-6 py-4 bg-gray-50 border-t">
                     <button
                        @click="open = false"
                        class="text-black bg-gray-200 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                        Tutup
                     </button>
                  </div>

               </div>
            </div>


         </div>

   </div>
</div>

@endsection