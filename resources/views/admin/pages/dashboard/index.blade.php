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
                <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Sistem Booking</span>
                <h1 class="text-slate-800 text-3xl font-black flex items-center mt-1">
                    <span class="w-3 h-8 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25"></span>
                    Dasbor Admin
                </h1>
                <p class="text-slate-500 text-xs md:text-sm mt-1">Kelola dan pantau seluruh status peminjaman ruangan dengan mudah.</p>
            </div>
            <div class="hidden md:block">
                <span class="inline-flex items-center px-4 py-2 rounded-2xl text-xs font-bold bg-white text-orange-600 border border-slate-200 shadow-sm">
                    <i class="fa-solid fa-circle-user mr-2 text-orange-500"></i>
                    Administrator Mode
                </span>
            </div>
        </div>

        {{-- ================= CARD STATISTIK ================= --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            {{-- BELUM DIPROSES --}}
            <div class="group bg-white rounded-3xl border border-slate-100 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(245,158,11,0.06)] hover:border-yellow-100/80 hover:-translate-y-1.5 transition-all duration-300 flex items-center justify-between overflow-hidden relative">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-yellow-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center text-lg font-bold shadow-inner group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">Belum Diproses</p>
                        <p class="text-2xl font-black text-slate-800 mt-0.5">{{ $belumDiproses }}</p>
                    </div>
                </div>
            </div>

            {{-- TERJADWAL --}}
            <div class="group bg-white rounded-3xl border border-slate-100 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(16,185,129,0.06)] hover:border-emerald-100/80 hover:-translate-y-1.5 transition-all duration-300 flex items-center justify-between overflow-hidden relative">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-emerald-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-lg font-bold shadow-inner group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">Terjadwal</p>
                        <p class="text-2xl font-black text-slate-800 mt-0.5">{{ $terjadwal }}</p>
                    </div>
                </div>
            </div>

            {{-- SEDANG BERLANGSUNG --}}
            <div class="group bg-white rounded-3xl border border-slate-100 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(59,130,246,0.06)] hover:border-blue-100/80 hover:-translate-y-1.5 transition-all duration-300 flex items-center justify-between overflow-hidden relative">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-lg font-bold shadow-inner group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-person-chalkboard"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">Berlangsung</p>
                        <p class="text-2xl font-black text-slate-800 mt-0.5">{{ $sedangBerlangsung }}</p>
                    </div>
                </div>
            </div>

            {{-- SELESAI --}}
            <div class="group bg-white rounded-3xl border border-slate-100 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.015)] hover:shadow-[0_20px_40px_rgba(100,116,139,0.06)] hover:border-slate-200 hover:-translate-y-1.5 transition-all duration-300 flex items-center justify-between overflow-hidden relative">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-slate-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-slate-50 text-slate-650 rounded-2xl flex items-center justify-center text-lg font-bold shadow-inner group-hover:bg-slate-500 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-check-double"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">Selesai</p>
                        <p class="text-2xl font-black text-slate-800 mt-0.5">{{ $selesai }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION GRID: FAVORIT & QUICK ACTIONS --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            {{-- RUANGAN FAVORIT --}}
            <div class="relative bg-orange-600 rounded-[32px] shadow-lg shadow-orange-500/10 text-white p-6 md:p-8 flex flex-col justify-between overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-36 h-36 bg-white/10 rounded-full pointer-events-none"></div>
                <div class="absolute -right-2 -top-6 w-24 h-24 bg-white/5 rounded-full pointer-events-none"></div>
                
                <div class="flex items-center justify-between relative z-10">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-xl font-bold shadow-inner">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-[10px] font-extrabold bg-white/20 backdrop-blur-md px-3 py-1 rounded-full uppercase tracking-wider">Statistik Populer</span>
                </div>

                <div class="mt-8 relative z-10">
                    <p class="text-xs font-bold text-orange-50 uppercase tracking-widest opacity-90">Ruangan Terfavorit</p>
                    <p class="text-xs opacity-75 mt-0.5">(Diperbarui 1 Bulan Terakhir)</p>
                    @if($ruanganFavorit)
                        <h3 class="text-2xl font-black mt-3 leading-tight tracking-tight">
                            {{ $ruanganFavorit->ruangan }}
                        </h3>
                        <p class="text-sm font-semibold text-orange-50 mt-1 opacity-90">
                            Telah digunakan sebanyak <span class="text-white font-extrabold underline decoration-white/40 decoration-2 underline-offset-4">{{ $ruanganFavorit->total }} kali</span>
                        </p>
                    @else
                        <h3 class="text-xl font-black mt-3">
                            Belum ada data
                        </h3>
                        <p class="text-xs text-orange-100/80 mt-1">Belum ada pemesanan tercatat.</p>
                    @endif
                </div>
            </div>

            {{-- PINTASAN CEPAT --}}
            <div class="lg:col-span-2 bg-white rounded-[32px] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.015)] p-6 md:p-8">
                <div class="border-b border-slate-100 pb-3 mb-5">
                    <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Navigasi Langsung</span>
                    <h2 class="text-slate-800 text-lg font-black mt-0.5">Pintasan Cepat</h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs">
                    <a href="{{ route('room.availability.index') }}"
                        class="group bg-slate-50 hover:bg-orange-50/50 hover:border-orange-200/50 border border-slate-100/50 p-4.5 rounded-2xl text-center transition duration-300">
                        <div class="w-10 h-10 bg-white shadow-sm border border-slate-100 group-hover:bg-orange-500 group-hover:text-white transition rounded-xl flex items-center justify-center mx-auto mb-3 text-orange-600 text-base">
                            <i class="fa-solid fa-door-open"></i>
                        </div>
                        <p class="font-extrabold text-slate-700 group-hover:text-orange-600 transition-colors leading-tight">
                            Ketersediaan Ruangan
                        </p>
                    </a>

                    <a href="{{ route('loan.request.index') }}"
                        class="group bg-slate-50 hover:bg-orange-50/50 hover:border-orange-200/50 border border-slate-100/50 p-4.5 rounded-2xl text-center transition duration-300">
                        <div class="w-10 h-10 bg-white shadow-sm border border-slate-100 group-hover:bg-orange-500 group-hover:text-white transition rounded-xl flex items-center justify-center mx-auto mb-3 text-orange-600 text-base">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </div>
                        <p class="font-extrabold text-slate-700 group-hover:text-orange-600 transition-colors leading-tight">
                            Permintaan Peminjaman
                        </p>
                    </a>

                    <a href="{{ route('loan.history.index') }}"
                        class="group bg-slate-50 hover:bg-orange-50/50 hover:border-orange-200/50 border border-slate-100/50 p-4.5 rounded-2xl text-center transition duration-300">
                        <div class="w-10 h-10 bg-white shadow-sm border border-slate-100 group-hover:bg-orange-500 group-hover:text-white transition rounded-xl flex items-center justify-center mx-auto mb-3 text-orange-600 text-base">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <p class="font-extrabold text-slate-700 group-hover:text-orange-600 transition-colors leading-tight">
                            Riwayat Peminjaman
                        </p>
                    </a>

                    <a href="{{ route('room.setting.index') }}"
                        class="group bg-slate-50 hover:bg-orange-50/50 hover:border-orange-200/50 border border-slate-100/50 p-4.5 rounded-2xl text-center transition duration-300">
                        <div class="w-10 h-10 bg-white shadow-sm border border-slate-100 group-hover:bg-orange-500 group-hover:text-white transition rounded-xl flex items-center justify-center mx-auto mb-3 text-orange-600 text-base">
                            <i class="fa-solid fa-door-closed"></i>
                        </div>
                        <p class="font-extrabold text-slate-700 group-hover:text-orange-600 transition-colors leading-tight">
                            Pengaturan Ruangan
                        </p>
                    </a>
                </div>
            </div>
        </div>

        {{-- ================= GRAFIK STATUS ================= --}}
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.015)] p-6 md:p-8">
            <div class="border-b border-slate-100 pb-3 mb-6 flex justify-between items-center">
                <div>
                    <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Visualisasi Data</span>
                    <h2 class="text-slate-800 text-lg font-black mt-0.5">Grafik Status Peminjaman</h2>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-wider">Real-time</span>
            </div>

            <div class="relative w-full overflow-hidden" style="max-height: 380px;">
                <canvas id="statusChart" height="90"></canvas>
            </div>
        </div>

    </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    
    // Create soft gradient for line fill area
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(249, 115, 22, 0.35)');
    gradient.addColorStop(1, 'rgba(249, 115, 22, 0.00)');

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
                borderColor: '#ea580c', // orange-600
                borderWidth: 4,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointBackgroundColor: '#ea580c',
                pointBorderColor: '#fff',
                pointBorderWidth: 3,
                shadowColor: 'rgba(234, 88, 12, 0.35)',
                shadowBlur: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1e293b',
                    titleFont: {
                        family: 'Raleway',
                        weight: 'bold',
                        size: 12
                    },
                    bodyFont: {
                        family: 'Raleway',
                        size: 12
                    },
                    padding: 12,
                    cornerRadius: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return ' Jumlah: ' + context.raw + ' Peminjaman';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    border: {
                        dash: [5, 5]
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            family: 'Raleway',
                            weight: 'bold',
                            size: 11
                        },
                        color: '#94a3b8'
                    },
                    grid: {
                        color: '#f1f5f9'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            family: 'Raleway',
                            weight: 'bold',
                            size: 11
                        },
                        color: '#94a3b8'
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>

@endsection
