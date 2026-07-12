@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64 min-h-screen bg-slate-50/50 pb-20 relative overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-10%] right-[-10%] w-[35rem] h-[35rem] bg-gradient-to-br from-orange-200/20 to-amber-200/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-5%] w-[30rem] h-[30rem] bg-gradient-to-tr from-orange-100/10 to-amber-100/25 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 pt-6 relative">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-200/80 pb-5 mb-8">
            <div>
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Persetujuan Ruangan</span>
                <h1 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Permintaan Peminjaman
                </h1>
                <p class="text-slate-500 text-xs md:text-sm mt-1">Kelola dan proses pengajuan izin peminjaman ruangan dari mahasiswa atau dosen.</p>
            </div>
        </div>

        {{-- FILTER & SEARCH FORM --}}
        <form method="GET" class="bg-white rounded-[24px] border border-slate-100 p-5 md:p-6 shadow-[0_8px_30px_rgb(0,0,0,0.015)] mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 text-slate-700">
                
                <!-- Search -->
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 tracking-wider">Cari Nama / Instansi</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau instansi..."
                        class="w-full text-sm p-3 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition text-slate-800 font-semibold bg-slate-50/50">
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 tracking-wider">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                        class="w-full text-sm p-3 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition text-slate-800 font-semibold bg-slate-50/50">
                </div>

                <!-- Time Interval -->
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 tracking-wider">Rentang Waktu</label>
                    <div class="flex items-center gap-2">
                        <input type="time" name="waktu_mulai" value="{{ request('waktu_mulai') }}"
                            class="w-full text-center text-sm p-3 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition text-slate-800 font-semibold bg-slate-50/50">
                        <span class="text-slate-400 font-bold">&ndash;</span>
                        <input type="time" name="waktu_selesai" value="{{ request('waktu_selesai') }}"
                            class="w-full text-center text-sm p-3 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition text-slate-800 font-semibold bg-slate-50/50">
                    </div>
                </div>

                <!-- Room Type -->
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 tracking-wider">Tipe Ruangan</label>
                    <select name="tipe_ruangan" class="w-full text-sm p-3 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition text-slate-800 font-semibold bg-slate-50/50">
                        <option value="">Semua Ruangan</option>
                        <option value="Rapat" {{ request('tipe_ruangan')=='Rapat'?'selected':'' }}>Ruang Rapat</option>
                        <option value="Laboratorium Komputer" {{ request('tipe_ruangan')=='Laboratorium Komputer'?'selected':'' }}>Laboratorium Komputer</option>
                        <option value="Sidang" {{ request('tipe_ruangan')=='Sidang'?'selected':'' }}>Ruang Sidang</option>
                        <option value="Aula" {{ request('tipe_ruangan')=='Aula'?'selected':'' }}>Aula</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 tracking-wider">Status</label>
                    <select name="status" class="w-full text-sm p-3 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition text-slate-800 font-semibold bg-slate-50/50">
                        <option value="">Semua Status</option>
                        @foreach (['Belum Diproses','Terjadwal','Sedang Berlangsung','Selesai','Ditolak'] as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex items-end gap-3">
                    <button type="submit" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 text-xs tracking-wider uppercase">
                        <i class="fa-solid fa-filter mr-2"></i> Terapkan Filter
                    </button>
                    <a href="{{ route('loan.request.index') }}" class="w-full inline-flex justify-center items-center bg-slate-100 hover:bg-slate-200 active:bg-slate-300 text-slate-700 font-extrabold py-3.5 px-6 rounded-xl transition-all duration-300 text-xs tracking-wider uppercase text-center border border-slate-200/50">
                        <i class="fa-solid fa-arrows-rotate mr-2"></i> Reset
                    </a>
                </div>

            </div>
        </form>

        {{-- TABLE CONTAINER --}}
        <div x-data="{ open: false, confirmApprove: false, selected: null }" class="bg-white rounded-[24px] border border-slate-100 overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.015)]">
            <div class="overflow-x-auto">
                <table class="w-full min-w-max text-sm text-left text-slate-600 whitespace-nowrap">
                    <thead class="text-[11px] font-black uppercase text-slate-400 bg-slate-50 border-b border-slate-100 tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Waktu Mulai</th>
                            <th class="px-6 py-4">Waktu Selesai</th>
                            <th class="px-6 py-4">Tipe Ruangan</th>
                            <th class="px-6 py-4">Nama Peminjam</th>
                            <th class="px-6 py-4">Instansi</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 font-medium">
                        @forelse ($peminjaman as $item)
                        <tr class="hover:bg-orange-50/20 transition-colors">
                            <td class="px-6 py-4 text-slate-800 font-bold">
                                {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}
                            </td>
                            <td class="px-6 py-4 text-slate-700">
                                {{ $item->tipe_ruangan }}
                            </td>
                            <td class="px-6 py-4 text-slate-800 font-semibold">
                                {{ $item->nama_penanggung_jawab }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->instansi }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $badgeColor = 'bg-slate-50 text-slate-600 border-slate-200/50';
                                    if ($item->status === 'Terjadwal') {
                                        $badgeColor = 'bg-emerald-50 text-emerald-700 border-emerald-200/40';
                                    } elseif ($item->status === 'Belum Diproses') {
                                        $badgeColor = 'bg-yellow-50 text-yellow-700 border-yellow-200/40';
                                    } elseif ($item->status === 'Sedang Berlangsung') {
                                        $badgeColor = 'bg-blue-50 text-blue-700 border-blue-200/40';
                                    } elseif ($item->status === 'Ditolak') {
                                        $badgeColor = 'bg-rose-50 text-rose-700 border-rose-200/40';
                                    }
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border uppercase tracking-wider {{ $badgeColor }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button @click="selected = @js($item); open = true" class="inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-2 px-4 rounded-xl shadow-sm hover:shadow transition duration-200 text-xs uppercase tracking-wider">
                                    Proses
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-slate-400 font-bold">
                                <div class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 border border-slate-100">
                                    <i class="fa-regular fa-folder-open text-slate-400 text-lg"></i>
                                </div>
                                Tidak ada data peminjaman ruangan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ================= MODAL DETAIL PROSES ================= --}}
            <div x-show="open" x-cloak x-transition.opacity.duration.200ms class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4" @click.self="open = false">
                <div x-show="open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="bg-white rounded-[32px] border border-slate-100 shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col">
                    
                    {{-- Header --}}
                    <div class="flex items-center justify-between px-6 py-5 bg-gradient-to-r from-orange-50 to-orange-50/20 border-b border-orange-100/50">
                        <div>
                            <span class="text-orange-600 font-extrabold text-[10px] uppercase tracking-widest">Persetujuan Reservasi</span>
                            <h3 class="text-base font-black text-slate-800 mt-0.5">Detail Peminjaman Ruangan</h3>
                        </div>
                        <button @click="open = false" class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition">
                            <i class="fa-solid fa-xmark text-xs"></i>
                        </button>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 md:p-8 space-y-6 overflow-y-auto max-h-[60vh]">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kode Peminjaman</p>
                            <span class="inline-flex mt-1.5 px-4.5 py-1.5 rounded-full bg-orange-50 text-orange-700 border border-orange-100 font-extrabold tracking-wider text-xs uppercase" x-text="selected?.kode_peminjaman"></span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 text-xs md:text-sm">
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Nama Penanggung Jawab</p>
                                <p class="font-bold text-slate-800" x-text="selected?.nama_penanggung_jawab"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">NIP/NIK/NIM</p>
                                <p class="font-bold text-slate-800" x-text="selected?.nik_penanggung_jawab"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Email Peminjam</p>
                                <p class="font-bold text-slate-800" x-text="selected?.email"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Instansi</p>
                                <p class="font-bold text-slate-700" x-text="selected?.instansi"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Jabatan</p>
                                <p class="font-bold text-slate-700" x-text="selected?.jabatan"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Tipe Ruangan</p>
                                <p class="font-bold text-slate-800" x-text="selected?.tipe_ruangan"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Ruangan</p>
                                <p class="font-bold text-slate-800" x-text="selected?.ruangan"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Tanggal Kegiatan</p>
                                <p class="font-bold text-slate-700" x-text="selected?.tanggal_peminjaman"></p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Waktu Kegiatan</p>
                                <p class="font-bold text-slate-700">
                                    <span x-text="selected?.waktu_mulai"></span> &ndash; <span x-text="selected?.waktu_selesai"></span>
                                </p>
                            </div>
                            <div class="border-b border-slate-50 pb-2">
                                <p class="text-slate-400 font-semibold mb-1">Status Reservasi</p>
                                <span class="inline-flex mt-1.5 px-3 py-1 rounded-full text-xs font-bold border uppercase tracking-wider"
                                    :class="{
                                        'bg-yellow-50 text-yellow-700 border-yellow-250': selected?.status === 'Belum Diproses',
                                        'bg-emerald-50 text-emerald-700 border-emerald-250': selected?.status === 'Terjadwal',
                                        'bg-blue-50 text-blue-700 border-blue-250': selected?.status === 'Sedang Berlangsung',
                                        'bg-rose-50 text-rose-700 border-rose-250': selected?.status === 'Ditolak',
                                        'bg-slate-50 text-slate-700 border-slate-250': selected?.status === 'Selesai'
                                    }"
                                    x-text="selected?.status"
                                ></span>
                            </div>
                            <div class="border-b border-slate-50 pb-2 col-span-1 md:col-span-2">
                                <p class="text-slate-400 font-semibold mb-1">Dokumen Lampiran</p>
                                <div class="flex flex-wrap gap-3 mt-1">
                                    <template x-if="selected?.document_user">
                                        <a :href="'{{ Storage::url('') }}' + selected.document_user.replace('public/', '')" target="_blank" class="inline-flex items-center text-xs font-bold bg-white text-orange-600 border border-orange-200 hover:bg-orange-50 px-3 py-2 rounded-lg transition">
                                            <i class="fa-solid fa-file-pdf mr-2"></i> Surat Permohonan (User)
                                        </a>
                                    </template>
                                    
                                    <template x-if="selected?.document_admin">
                                        <a :href="'{{ Storage::url('') }}' + selected.document_admin.replace('public/', '')" target="_blank" class="inline-flex items-center text-xs font-bold bg-white text-emerald-600 border border-emerald-200 hover:bg-emerald-50 px-3 py-2 rounded-lg transition">
                                            <i class="fa-solid fa-file-signature mr-2"></i> Surat Balasan (Admin)
                                        </a>
                                    </template>
                                    
                                    <template x-if="!selected?.document_user && !selected?.document_admin">
                                        <p class="font-bold text-slate-800">Tidak ada dokumen</p>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tujuan / Keperluan</p>
                            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 text-xs md:text-sm text-slate-700 leading-relaxed font-semibold">
                                <span x-text="selected?.keperluan"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="flex justify-end gap-3 px-6 py-5 bg-slate-50 border-t border-slate-100">
                        <button x-show="selected?.status === 'Belum Diproses'" @click="confirmApprove = true" class="inline-flex justify-center items-center bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-extrabold py-2.5 px-5 rounded-xl shadow-sm transition text-xs uppercase tracking-wider">
                            <i class="fa-solid fa-square-check mr-2"></i> Konfirmasi Peminjaman
                        </button>
                        <button @click="open = false" class="bg-slate-200 hover:bg-slate-350 text-slate-700 font-extrabold px-5 py-2.5 rounded-xl transition text-xs uppercase tracking-wider">
                            Tutup
                        </button>
                    </div>

                </div>
            </div>

            {{-- ================= MODAL KONFIRMASI PERSETUJUAN ================= --}}
            <div x-show="confirmApprove" x-cloak x-transition.opacity.duration.200ms class="fixed inset-0 z-[60] flex items-center justify-center bg-black/60 p-4" @click.self="confirmApprove = false">
                <div class="bg-white rounded-[28px] border border-slate-100 shadow-2xl w-full max-w-md p-6 relative overflow-hidden">
                    <h3 class="text-lg font-black text-slate-800 mb-2 flex items-center">
                        <i class="fa-solid fa-circle-question text-orange-500 mr-2.5 text-xl"></i>
                        Proses Pengajuan?
                    </h3>
                    
                    <div class="my-4 bg-slate-50 rounded-2xl p-4 border border-slate-100 space-y-2 text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Kode Peminjaman</span>
                            <span class="font-bold text-orange-700" x-text="selected?.kode_peminjaman"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Ruangan</span>
                            <span class="font-bold text-slate-800" x-text="selected?.ruangan"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Tanggal</span>
                            <span class="font-semibold text-slate-700" x-text="selected?.tanggal_peminjaman"></span>
                        </div>
                    </div>

                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        Silakan pilih tindakan untuk pengajuan ini. Menolak atau menyetujui akan memperbarui status peminjaman secara instan.
                    </p>

                    <form method="POST" id="processForm" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" x-bind:value="selected.id">

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Surat Balasan / Persetujuan (PDF)</label>
                            <input type="file" name="document_admin" required accept="application/pdf" class="w-full text-sm p-2 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <span class="text-[10px] text-slate-400 mt-1 block font-medium">Unggah surat balasan untuk peminjam. Format: PDF, Maks: 5MB.</span>
                        </div>

                        <div class="flex justify-end gap-3 mt-4">
                            <button type="button" @click="confirmApprove = false" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-6 py-3 rounded-xl transition text-xs uppercase tracking-wider border border-slate-200/50">
                                Batal
                            </button>

                            <button type="submit" @click="document.getElementById('processForm').action = '{{ url('admin/loan-request/reject') }}'" class="bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-extrabold px-6 py-3 rounded-xl transition text-xs uppercase tracking-wider shadow-sm">
                                Tolak
                            </button>

                            <button type="submit" @click="document.getElementById('processForm').action = '{{ url('admin/loan-request') }}/' + selected?.id + '/approve'" class="bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-extrabold px-6 py-3 rounded-xl transition text-xs uppercase tracking-wider shadow-sm">
                                Setujui
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection