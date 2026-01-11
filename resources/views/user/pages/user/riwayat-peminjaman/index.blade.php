@extends('user.layouts.main')
@section('container')

<div
    x-data="{
        open: false,
        pdfUrl: '',
        kode: ''
    }"
    class="min-h-screen bg-white p-4 sm:pt-28"
>
    <h2 class="text-orange-600 font-bold text-2xl">Riwayat Peminjaman</h2>
    <h3 class="text-orange-600 text-md mb-6">
        Daftar peminjaman yang telah selesai
    </h3>

    {{-- CARD LIST --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

        @forelse ($riwayat as $item)
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition">

                <h5 class="mb-1 text-xl font-bold text-gray-900">
                    {{ $item->ruangan }}
                </h5>

                <p class="mb-2 text-sm text-gray-600">
                    {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->translatedFormat('d F Y') }}
                    <br>
                    {{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}
                </p>

                <p class="mb-3 text-sm text-black">
                    Kode Peminjaman:
                    <span class="font-semibold text-gray-800">
                        {{ $item->kode_peminjaman }}
                    </span>
                </p>

                <p class="mb-4 text-sm text-black">
                    Status:
                    <span class="font-semibold
                        @if($item->status === 'Terjadwal') text-green-600
                        @elseif($item->status === 'Sedang Berlangsung') text-blue-600
                        @elseif($item->status === 'Selesai') text-gray-600
                        @else text-yellow-600
                        @endif
                    ">
                        {{ $item->status }}
                    </span>
                </p>

                {{-- BUTTON LIHAT BUKTI --}}
                <button
                    @click="
                        const fileName = 'Bukti Peminjaman #{{ $item->kode_peminjaman }}.pdf';
                        pdfUrl = '/pdf/bukti-peminjaman/' + encodeURIComponent(fileName);
                        kode = '{{ $item->kode_peminjaman }}';
                        open = true;
                    "
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700"
                >
                    Lihat Bukti Peminjaman
                </button>


            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">
                Belum ada data riwayat peminjaman.
            </div>
        @endforelse

    </div>

    {{-- ================= MODAL PDF ================= --}}
    <div
        x-show="open"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm"
        @click.self="open = false"
    >
        <div
            x-transition.scale
            class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl mx-4 overflow-hidden"
        >

            {{-- HEADER --}}
            <div class="flex items-center justify-between px-6 py-4 bg-orange-50 border-b">
                <div>
                    <h3 class="text-lg font-semibold text-orange-600">
                        Bukti Peminjaman Ruangan
                    </h3>
                    <p class="text-sm text-gray-500">
                        Kode:
                        <span class="font-semibold" x-text="kode"></span>
                    </p>
                </div>

                <button
                    @click="open = false"
                    class="text-2xl text-gray-400 hover:text-gray-600 leading-none"
                >
                    &times;
                </button>
            </div>

            {{-- PDF CONTENT --}}
            <div class="h-[75vh] bg-gray-100 overflow-y-auto">
                <iframe
                    :src="pdfUrl"
                    class="w-full h-full border"
                ></iframe>
            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50 border-t">
                <a
                    :href="pdfUrl"
                    download
                    class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded-lg transition"
                >
                    Unduh Bukti
                </a>

                <button
                    @click="open = false"
                    class="bg-gray-400 hover:bg-gray-500 px-5 py-2 rounded-lg transition"
                >
                    Tutup
                </button>
            </div>

        </div>
    </div>
</div>

@endsection
