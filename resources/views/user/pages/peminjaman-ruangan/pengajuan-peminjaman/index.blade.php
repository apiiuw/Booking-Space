@extends('user.layouts.main')
@section('container')

<div class="h-full bg-white">
    <div class="relative flex justify-end items-center pr-20 pt-32 bg-cover bg-center h-[40vh]" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20 "></div>

        <a href="{{ url()->previous() }}" 
            class="absolute flex justify-center items-center top-1/2 left-5 bg-orange-600 text-white rounded-full py-3 px-5 hover:bg-orange-700 transition duration-300 shadow-lg">
                <i class="fa-solid fa-angles-left"></i>
                <p class="ml-2 pt-0.5">Kembali</p>
        </a>

        <h1 class="relative h-1/2 font-raleway font-extrabold text-4xl text-orange-600">
            Pengajuan Peminjaman<br><span class="text-2xl bg-orange-600 text-white rounded-2xl px-2 py-1">Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }} - {{ $tanggal->translatedFormat('l, j F Y') }}</span>
        </h1>
    </div>

    <div class="h-full px-10 py-10 flex flex-col justify-start items-start">

        <div class="flex flex-row justify-start items-start w-full">
            <div class="flex flex-col justify-start items-start w-1/2">
                <h1 class="text-orange-600 text-2xl font-bold">
                    Jadwal Peminjaman Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}
                </h1>

                <ol class="relative w-full border-s border-gray-200 mt-10">

                    @if ($jadwalPeminjaman->isEmpty())
                        <p class="text-gray-500 mt-6">Belum ada peminjaman pada tanggal ini.</p>
                    @else
                        @foreach ($jadwalPeminjaman as $jadwal)
                            <li class="mb-10 ms-6">
                                <span class="absolute flex items-center justify-center w-6 h-6 bg-orange-100 rounded-full -start-3 ring-8 ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-800" fill="currentColor" viewBox="0 0 640 640">
                                        <path d="M224 64C206.3 64 192 78.3 192 96L192 128L160 128C124.7 128 96 156.7 96 192L96 240L544 240L544 192C544 156.7 515.3 128 480 128L448 128L448 96C448 78.3 433.7 64 416 64C398.3 64 384 78.3 384 96L384 128L256 128L256 96C256 78.3 241.7 64 224 64zM96 288L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 288L96 288z"/>
                                    </svg>
                                </span>

                                <h3 class="mb-1 text-lg font-semibold text-gray-900">
                                    {{ $jadwal->keperluan }}
                                    <span class="bg-orange-100 text-orange-800 text-sm font-medium ms-3 px-2.5 py-0.5 rounded-sm">
                                        {{ ucfirst($jadwal->status) }}
                                    </span>
                                </h3>

                                <time class="block mb-2 text-sm text-orange-400">
                                    {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} s/d {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                </time>

                                <table class="w-9/12 border border-gray-400 border-collapse">
                                    <tbody>
                                        <tr class="border-b border-gray-300">
                                            <td class="bg-orange-600 text-white px-3 py-1 border-r border-gray-300">
                                                Nama Peminjam
                                            </td>
                                            <td class="px-3 py-1 text-black">
                                                {{ $jadwal->nama_penanggung_jawab }}
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-300">
                                            <td class="bg-orange-600 text-white px-3 py-1 border-r border-gray-300">
                                                NIK/NIP
                                            </td>
                                            <td class="px-3 py-1 text-black">
                                                {{ $jadwal->nik_penanggung_jawab }}
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-300">
                                            <td class="bg-orange-600 text-white px-3 py-1 border-r border-gray-300">
                                                Instansi
                                            </td>
                                            <td class="px-3 py-1 text-black">
                                                {{ $jadwal->instansi }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="bg-orange-600 text-white px-3 py-1 border-r border-gray-300">
                                                Jabatan
                                            </td>
                                            <td class="px-3 py-1 text-black">
                                                {{ $jadwal->jabatan }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </li>
                        @endforeach
                    @endif


                </ol>

            </div>
            <div class="flex flex-col justify-center items-center w-1/2 bg-orange-600 border p-6 shadow-md">
                <h1 class="text-white text-xl font-semibold bg-orange-700 py-1 px-3 w-full text-center">Form Pengajuan Peminjaman</h1>
                <form action="peminjamanRuangan.pengajuan-peminjaman.store" method="POST" class="w-full space-y-8">
                    @csrf
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    
                    <!-- SECTION 1: Data Penanggung Jawab -->
                    <div>
                        <h2 class="text-lg font-semibold text-white mb-3 border-b-2 border-white pb-1">Data Penanggung Jawab</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-white">Nama Penanggung Jawab</label>
                                <input type="text" name="nama_penanggung_jawab" placeholder="Tuliskan nama penanggung jawab" class="w-full p-2 text-black placeholder:text-gray-400 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-white">NIK/NIP Penanggung Jawab</label>
                                <input type="text" name="nik_penanggung_jawab" placeholder="Tuliskan NIK/NIP penanggung jawab" class="w-full p-2 text-black placeholder:text-gray-400 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-white">Instansi/Organisasi</label>
                                <input type="text" name="instansi" placeholder="Tuliskan Instansi/Organisasi" class="w-full p-2 text-black placeholder:text-gray-400 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-white">Jabatan Penanggung Jawab</label>
                                <input type="text" name="jabatan" placeholder="Tuliskan jabatan penanggung jawab" class="w-full p-2 text-black placeholder:text-gray-400 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Detail Peminjaman -->
                    <div>
                        <h2 class="text-lg font-semibold text-white mb-3 border-b-2 border-white pb-1">
                            Detail Peminjaman
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <!-- Tipe Ruangan (READONLY) -->
                            <div>
                                <label class="block text-sm font-medium text-white">Tipe Ruangan</label>
                                <input type="text"
                                    value="{{ ucwords(str_replace('-', ' ', $tipe)) }}"
                                    readonly
                                    class="w-full p-2 bg-gray-200 text-black rounded-md border border-gray-400 cursor-not-allowed">

                                <input type="hidden" name="tipe_ruangan" value="{{ ucwords(str_replace('-', ' ', $tipe)) }}">
                            </div>

                            <!-- Ruangan (READONLY) -->
                            <div>
                                <label class="block text-sm font-medium text-white">Ruangan</label>
                                <input type="text"
                                    value="{{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}"
                                    readonly
                                    class="w-full p-2 bg-gray-200 text-black rounded-md border border-gray-400 cursor-not-allowed">

                                <input type="hidden" name="ruangan" value="{{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}">
                            </div>

                            <!-- Tanggal Peminjaman (READONLY) -->
                            <div>
                                <label class="block text-sm font-medium text-white">Tanggal Peminjaman</label>
                                <input type="text"
                                    value="{{ $tanggal->translatedFormat('l, j F Y') }}"
                                    readonly
                                    class="w-full p-2 bg-gray-200 text-black rounded-md border border-gray-400 cursor-not-allowed">

                                <input type="hidden"
                                    name="tanggal_peminjaman"
                                    value="{{ $tanggal->format('Y-m-d') }}">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                            <!-- Waktu Mulai -->
                            <div>
                                <label class="block text-sm font-medium text-white">Waktu Mulai</label>
                                <input type="time"
                                    name="waktu_mulai"
                                    min="07:00"
                                    max="17:00"
                                    required
                                    class="w-full p-2 bg-white text-black placeholder:text-gray-400 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>

                            <!-- Waktu Selesai -->
                            <div>
                                <label class="block text-sm font-medium text-white">Waktu Selesai</label>
                                <input type="time"
                                    name="waktu_selesai"
                                    min="07:00"
                                    max="17:00"
                                    required
                                    class="w-full p-2 bg-white text-black placeholder:text-gray-400 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>

                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-white">Tujuan Peminjaman</label>
                            <textarea name="keperluan" rows="4" class="w-full text-black placeholder:text-gray-400 p-2 rounded-md border border-gray-400 focus:ring-2 focus:ring-orange-500 focus:outline-none" placeholder="Tuliskan keperluan peminjaman ruangan..."></textarea>
                        </div>

                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-0 flex items-center justify-center">
                        <button id="btnAjukan"
                            type="submit"
                            class="w-full bg-white text-orange-600 py-2 rounded-lg hover:bg-gray-200 disabled:bg-gray-200 disabled:text-red-500">
                            Ajukan Peminjaman
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    const jadwalPeminjaman = @json($jadwalPeminjaman);

    const inputMulai   = document.querySelector('[name="waktu_mulai"]');
    const inputSelesai = document.querySelector('[name="waktu_selesai"]');
    const btnSubmit    = document.getElementById('btnAjukan');

    function timeToMinutes(time) {
        const [h, m] = time.split(':').map(Number);
        return h * 60 + m;
    }

    function isBentrok(mulai, selesai) {
        return jadwalPeminjaman.some(j => {
            return mulai < j.waktu_selesai && selesai > j.waktu_mulai;
        });
    }

    function cekValidasi() {
        const mulai   = inputMulai.value;
        const selesai = inputSelesai.value;

        if (!mulai || !selesai) return;

        const mulaiMenit   = timeToMinutes(mulai);
        const selesaiMenit = timeToMinutes(selesai);

        // ❌ Selesai harus setelah mulai
        if (selesaiMenit <= mulaiMenit) {
            Swal.fire({
                icon: 'warning',
                title: 'Waktu tidak valid',
                text: 'Waktu selesai harus setelah waktu mulai'
            });
            btnSubmit.disabled = true;
            return;
        }

        // ❌ Minimal 1 jam
        if ((selesaiMenit - mulaiMenit) < 60) {
            Swal.fire({
                icon: 'warning',
                title: 'Durasi terlalu singkat',
                text: 'Minimal peminjaman adalah 1 jam'
            });
            btnSubmit.disabled = true;
            return;
        }

        // ❌ Bentrok jadwal
        if (isBentrok(mulai, selesai)) {
            Swal.fire({
                icon: 'error',
                title: 'Jadwal bentrok',
                text: 'Rentang waktu tersebut sudah digunakan oleh peminjam lain'
            });
            btnSubmit.disabled = true;
            return;
        }

        // ✅ Aman
        btnSubmit.disabled = false;
    }

    inputMulai.addEventListener('change', cekValidasi);
    inputSelesai.addEventListener('change', cekValidasi);
</script>

@endpush
