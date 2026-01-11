@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-gray-200 min-h-screen">
         <h2 class="text-orange-600 font-bold text-2xl">Permintaan Peminjaman</h2>
         <h3 class="text-orange-600 text-md mb-3">Pilihlah permintaan peminjaman yang ingin di proses!</h3>

         {{-- FILTER & SEARCH --}}
         <form method="GET" class="bg-white p-4 rounded-lg shadow-md mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 text-black">

               {{-- Search Nama / Instansi --}}
               <div>
                  <label class="text-sm font-medium text-gray-700">Search Nama / Instansi</label>
                  <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau instansi..."
                     class="mt-1 w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
               </div>

               {{-- Filter Tanggal --}}
               <div>
                  <label class="text-sm font-medium text-gray-700">Tanggal</label>
                  <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                     class="mt-1 w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
               </div>

               {{-- Filter Waktu --}}
               <div>
                  <label class="text-sm font-medium text-gray-700">Waktu Mulai - Selesai</label>
                  <div class="flex items-center gap-2 mt-1">
                     <input type="time" name="waktu_mulai" value="{{ request('waktu_mulai') }}"
                        class="w-full text-center rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                     <p>-</p>
                     <input type="time" name="waktu_selesai" value="{{ request('waktu_selesai') }}"
                        class="w-full text-center rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                  </div>
               </div>

               {{-- Filter Tipe Ruangan --}}
               <div>
                  <label class="text-sm font-medium text-gray-700">Tipe Ruangan</label>
                  <select
                     name="tipe_ruangan" class="mt-1 w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                     <option value="">Semua Ruangan</option>
                     <option value="Ruang Rapat" {{ request('tipe_ruangan') == 'Ruang Rapat' ? 'selected' : '' }}>
                        Ruang Rapat
                     </option>
                     <option value="Aula">Aula</option>
                     <option value="Laboratorium">Laboratorium</option>
                  </select>
               </div>

               {{-- Filter Status --}}
               <div>
                  <label class="text-sm font-medium text-gray-700">Status Peminjaman</label>
                  <select
                     name="status" class="mt-1 w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                     <option value="">Semua Status</option>
                     @foreach (['Belum Diproses','Terjadwal','Sedang Berlangsung','Selesai','Ditolak'] as $status)
                        <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                           {{ $status }}
                        </option>
                     @endforeach
                  </select>
               </div>

               {{-- Button --}}
               <div class="flex items-end gap-2">
                  <button
                     type="submit"
                     class="w-full bg-orange-600 text-white py-2 rounded-md hover:bg-orange-700 transition text-sm">
                     Terapkan Filter
                  </button>

                  <a href="{{ route('loan.request.index') }}"
                     class="w-full text-center bg-gray-200 text-gray-700 py-2 rounded-md hover:bg-gray-300 transition text-sm">
                     Reset
                  </a>
               </div>

            </div>
         </form>

         {{-- WRAPPER ALPINE --}}
         <div x-data="{ open: false, confirmApprove: false, selected: null }">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
               <table class="w-full min-w-max text-sm text-left text-gray-500 whitespace-nowrap">
                  <thead class="text-xs text-white uppercase bg-orange-600">
                     <tr>
                        <th class="px-6 py-3 text-center">Tanggal</th>
                        <th class="px-6 py-3 text-center">Waktu Mulai</th>
                        <th class="px-6 py-3 text-center">Waktu Selesai</th>
                        <th class="px-6 py-3 text-center">Tipe Ruangan</th>
                        <th class="px-6 py-3 text-center">Nama Peminjaman</th>
                        <th class="px-6 py-3 text-center">Instansi</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                     </tr>
                  </thead>

                  <tbody>
                  @forelse ($peminjaman as $item)
                     <tr class="bg-white border-b hover:bg-orange-50">

                        <td class="px-6 py-4 text-center">
                           {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->translatedFormat('d F Y') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                           {{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H.i') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                           {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H.i') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                           {{ $item->tipe_ruangan }}
                        </td>

                        <td class="px-6 py-4 text-center">
                           {{ $item->nama_penanggung_jawab }}
                        </td>

                        <td class="px-6 py-4 text-center">
                           {{ $item->instansi }}
                        </td>

                        <td class="px-6 py-4 text-center">
                           <span class="px-2 py-1 rounded-md text-sm
                              @if($item->status === 'Terjadwal') bg-green-100
                              @elseif($item->status === 'Belum Diproses') bg-yellow-100
                              @elseif($item->status === 'Sedang Berlangsung') bg-blue-100
                              @elseif($item->status === 'Ditolak') bg-red-100
                              @else bg-gray-100
                              @endif">
                              {{ $item->status }}
                           </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                           <button
                              @click="
                                 selected = @js($item);
                                 open = true
                              "
                              class="bg-orange-600 text-white px-3 py-2 rounded-md hover:bg-orange-700">
                              Proses
                           </button>
                        </td>

                     </tr>
                  @empty
                     <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">
                           Tidak ada data peminjaman ruangan
                        </td>
                     </tr>
                  @endforelse
                  </tbody>
               </table>
            </div>

            {{-- ================= MODAL DETAIL ================= --}}
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
               @click.self="open = false">
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
                        Detail Peminjaman Ruangan
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
                           <p class="text-gray-500">NIK</p>
                           <p class="font-medium" x-text="selected?.nik_penanggung_jawab"></p>
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
                           <p class="text-gray-500">Tanggal Peminjaman</p>
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
                           <p class="text-gray-500">Status Peminjaman</p>
                           <span
                              class="inline-block mt-1 px-3 py-1 rounded-md text-sm font-medium"
                              :class="{
                                 'bg-yellow-100': selected?.status === 'Belum Diproses',
                                 'bg-green-100': selected?.status === 'Terjadwal',
                                 'bg-blue-100': selected?.status === 'Sedang Berlangsung',
                                 'bg-red-100': selected?.status === 'Ditolak',
                                 'bg-gray-100': selected?.status === 'Selesai'
                              }"
                              x-text="selected?.status"
                           ></span>
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
                  <div class="flex justify-end gap-2 px-6 py-4 bg-gray-50 border-t">
                     <button
                        x-show="selected?.status === 'Belum Diproses'"
                        @click="confirmApprove = true"
                        class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                        Konfirmasi Peminjaman
                     </button>

                     <button
                        @click="open = false"
                        class="text-black bg-gray-200 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                        Tutup
                     </button>
                  </div>

               </div>
            </div>

            {{-- ================= MODAL KONFIRMASI ================= --}}
            <div
               x-show="confirmApprove"
               x-cloak
               x-transition.opacity.duration.200ms
               class="fixed inset-0 z-[60] flex items-center justify-center bg-black/60"
               @click.self="confirmApprove = false"
            >
               <div class="bg-white text-gray-800 rounded-xl shadow-xl w-full max-w-md p-6">

                  <h3 class="font-semibold mb-3">Konfirmasi Peminjaman</h3>

                  <div class="mb-3">
                     <p class="text-sm text-gray-500">Kode Peminjaman</p>
                     <p class="inline-block mt-1 px-3 py-1 rounded-md bg-orange-100 text-orange-700 font-semibold">
                        <span x-text="selected?.kode_peminjaman"></span>
                     </p>
                  </div>

                  <p class="text-sm mb-4 text-gray-700">
                     Yakin memproses peminjaman ruangan
                     <strong x-text="selected?.ruangan"></strong>?
                  </p>

                  <div class="flex justify-end gap-2">

                     {{-- BATAL --}}
                     <button
                        type="button"
                        @click="confirmApprove = false"
                        class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                        Batal
                     </button>

                     {{-- TOLAK --}}
                     <form method="POST" action="{{ route('loan.request.reject') }}">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" x-bind:value="selected.id">

                        <button
                           type="submit"
                           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                           Tolak
                        </button>
                     </form>

                     {{-- SETUJUI --}}
                     <form method="POST" action="{{ route('loan.request.approve', ['id' => 0]) }}">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" x-bind:value="selected.id">

                        <button
                           type="submit"
                           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                           Setujui & Jadwalkan
                        </button>
                     </form>

                  </div>
               </div>
            </div>


         </div>


   </div>
</div>

@endsection