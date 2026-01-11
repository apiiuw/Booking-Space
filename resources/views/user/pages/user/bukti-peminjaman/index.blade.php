@extends('user.layouts.main')
@section('container')

<div class="min-h-screen bg-white p-4 sm:pt-28">
    <h2 class="text-orange-600 font-bold text-2xl">Bukti Peminjaman</h2>
    <h3 class="text-orange-600 text-md mb-3">Pilihlah Bukti peminjamanmu!</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-7 gap-y-7">

    @forelse ($peminjaman as $item)
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
            <h5 class="mb-2 text-xl font-bold text-gray-900">
                {{ $item->ruangan }}
            </h5>

            <p class="mb-3 text-gray-700">
                {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->translatedFormat('d F Y') }}
                ({{ $item->waktu_mulai }} - {{ $item->waktu_selesai }})
            </p>

            <p class="mb-3 text-sm text-black">
                Status:
                <span class="
                    font-semibold
                    {{ $item->status === 'disetujui' ? 'text-green-600' :
                    ($item->status === 'ditolak' ? 'text-red-600' : 'text-yellow-600') }}">
                    {{ ucfirst($item->status) }}
                </span>
            </p>

            <a href="{{ route('bukti.peminjaman') }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700">
                Lihat Bukti Peminjaman
                <svg class="w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    @empty
        <div class="col-span-3 text-center text-gray-500">
            Belum ada data peminjaman.
        </div>
    @endforelse

    </div>

</div>

@endsection