@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-gray-200 min-h-screen">
      <h2 class="text-orange-600 font-bold text-2xl mb-6">Dasbor Admin</h2>

      {{-- ================= CARD STATISTIK ================= --}}
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-3">

         {{-- BELUM DIPROSES --}}
         <div class="relative bg-white rounded-xl shadow hover:shadow-lg transition p-6 overflow-hidden">
            <div class="absolute right-4 top-4 text-yellow-400 text-4xl opacity-20">
               <i class="fa-solid fa-clock"></i>
            </div>

            <div class="flex items-center gap-4">
               <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
                  <i class="fa-solid fa-hourglass-half text-xl"></i>
               </div>
               <div>
                  <p class="text-sm text-gray-500">Belum Diproses</p>
                  <p class="text-3xl font-bold text-gray-800">{{ $belumDiproses }}</p>
               </div>
            </div>
         </div>

         {{-- TERJADWAL --}}
         <div class="relative bg-white rounded-xl shadow hover:shadow-lg transition p-6 overflow-hidden">
            <div class="absolute right-4 top-4 text-green-400 text-4xl opacity-20">
               <i class="fa-solid fa-calendar-check"></i>
            </div>

            <div class="flex items-center gap-4">
               <div class="bg-green-100 text-green-600 p-4 rounded-full">
                  <i class="fa-solid fa-calendar-days text-xl"></i>
               </div>
               <div>
                  <p class="text-sm text-gray-500">Terjadwal</p>
                  <p class="text-3xl font-bold text-gray-800">{{ $terjadwal }}</p>
               </div>
            </div>
         </div>

         {{-- SEDANG BERLANGSUNG --}}
         <div class="relative bg-white rounded-xl shadow hover:shadow-lg transition p-6 overflow-hidden">
            <div class="absolute right-4 top-4 text-blue-400 text-4xl opacity-20">
               <i class="fa-solid fa-play"></i>
            </div>

            <div class="flex items-center gap-4">
               <div class="bg-blue-100 text-blue-600 p-4 rounded-full">
                  <i class="fa-solid fa-person-chalkboard text-xl"></i>
               </div>
               <div>
                  <p class="text-sm text-gray-500">Sedang Berlangsung</p>
                  <p class="text-3xl font-bold text-gray-800">{{ $sedangBerlangsung }}</p>
               </div>
            </div>
         </div>

         {{-- SELESAI --}}
         <div class="relative bg-white rounded-xl shadow hover:shadow-lg transition p-6 overflow-hidden">
            <div class="absolute right-4 top-4 text-gray-400 text-4xl opacity-20">
               <i class="fa-solid fa-circle-check"></i>
            </div>

            <div class="flex items-center gap-4">
               <div class="bg-gray-100 text-gray-600 p-4 rounded-full">
                  <i class="fa-solid fa-check-double text-xl"></i>
               </div>
               <div>
                  <p class="text-sm text-gray-500">Selesai</p>
                  <p class="text-3xl font-bold text-gray-800">{{ $selesai }}</p>
               </div>
            </div>
         </div>

      </div>

      {{-- RUANGAN FAVORIT --}}
      <div class="bg-orange-600 rounded-xl shadow text-white p-6 mb-3">
         <div class="flex items-center gap-4">
            <div class="bg-white/20 p-4 rounded-full">
               <i class="fa-solid fa-star text-2xl"></i>
            </div>

            <div>
               <p class="text-sm opacity-90">Ruangan Favorit (1 Bulan Terakhir)</p>

               @if($ruanganFavorit)
                  <p class="text-xl font-semibold">
                     {{ $ruanganFavorit->ruangan }}
                  </p>
                  <p class="text-sm opacity-80">
                     Digunakan {{ $ruanganFavorit->total }} kali
                  </p>
               @else
                  <p class="text-sm opacity-80">Belum ada data</p>
               @endif
            </div>
         </div>
      </div>

      {{-- PINTASAN CEPAT --}}
      <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 mb-3">
         <p class="text-sm text-gray-500 mb-4">Pintasan Cepat</p>

         <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">

            <a href="{{ route('room.availability.index') }}"
               class="group bg-orange-50 hover:bg-orange-100 p-4 rounded-xl text-center transition">
               <i class="fa-solid fa-door-open text-orange-600 text-2xl mb-2"></i>
               <p class="font-medium text-gray-700 group-hover:text-orange-600">
                  Ketersediaan Ruangan
               </p>
            </a>

            <a href="{{ route('loan.request.index') }}"
               class="group bg-orange-50 hover:bg-orange-100 p-4 rounded-xl text-center transition">
               <i class="fa-solid fa-file-circle-plus text-orange-600 text-2xl mb-2"></i>
               <p class="font-medium text-gray-700 group-hover:text-orange-600">
                  Permintaan Peminjaman
               </p>
            </a>

            <a href="{{ route('loan.history.index') }}"
               class="group bg-orange-50 hover:bg-orange-100 p-4 rounded-xl text-center transition">
               <i class="fa-solid fa-clock-rotate-left text-orange-600 text-2xl mb-2"></i>
               <p class="font-medium text-gray-700 group-hover:text-orange-600">
                  Riwayat Peminjaman
               </p>
            </a>

            <a href="{{ route('room.setting.index') }}"
               class="group bg-orange-50 hover:bg-orange-100 p-4 rounded-xl text-center transition">
               <i class="fa-solid fa-door-closed text-orange-600 text-2xl mb-2"></i>
               <p class="font-medium text-gray-700 group-hover:text-orange-600">
                  Pengaturan Ruangan
               </p>
            </a>

         </div>
      </div>

      {{-- ================= GRAFIK STATUS ================= --}}
      <div class="bg-white rounded-xl shadow p-6">
         <p class="text-sm text-gray-500 mb-4">Grafik Status Peminjaman</p>

         <canvas id="statusChart" height="110"></canvas>
      </div>

   </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   const ctx = document.getElementById('statusChart').getContext('2d');

   new Chart(ctx, {
      type: 'line',
      data: {
         labels: [
            'Belum Diproses',
            'Terjadwal',
            'Sedang Berlangsung',
            'Selesai'
         ],
         datasets: [{
            label: 'Jumlah Peminjaman',
            data: [
               {{ $chartData['belum'] }},
               {{ $chartData['terjadwal'] }},
               {{ $chartData['berlangsung'] }},
               {{ $chartData['selesai'] }}
            ],
            borderColor: '#f97316', // orange-500
            backgroundColor: 'rgba(249, 115, 22, 0.15)',
            fill: true,
            tension: 0.4,
            pointRadius: 5,
            pointHoverRadius: 7,
            pointBackgroundColor: '#f97316',
            pointBorderColor: '#fff',
            pointBorderWidth: 2
         }]
      },
      options: {
         responsive: true,
         plugins: {
            legend: {
               display: false
            },
            tooltip: {
               callbacks: {
                  label: function(context) {
                     return 'Jumlah: ' + context.raw;
                  }
               }
            }
         },
         scales: {
            y: {
               beginAtZero: true,
               ticks: {
                  precision: 0
               },
               grid: {
                  color: '#f3f4f6'
               }
            },
            x: {
               grid: {
                  display: false
               }
            }
         }
      }
   });
</script>



@endsection
