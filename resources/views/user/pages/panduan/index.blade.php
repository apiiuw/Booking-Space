@extends('user.layouts.main')
@section('container')

<div class="relative min-h-screen bg-slate-50 pb-24 overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-5%] right-[-5%] w-[45rem] h-[45rem] bg-gradient-to-br from-orange-200/30 to-amber-150/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-10%] w-[35rem] h-[35rem] bg-gradient-to-tr from-orange-100/20 to-amber-100/30 rounded-full blur-3xl -z-10"></div>

    <!-- Hero Banner with Glassmorphism Title -->
    <div class="relative flex justify-start items-center px-6 md:px-20 pt-36 bg-cover bg-center h-[42vh] md:h-[48vh] shadow-lg rounded-b-[40px] overflow-hidden" 
        style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-900/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-transparent to-transparent"></div>

        <div class="relative z-10 bg-white/90 backdrop-blur-xl border border-white/60 p-6 md:p-8 rounded-3xl shadow-[0_20px_50px_rgba(249,115,22,0.15)] max-w-2xl mt-8 md:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-widest mb-3">
                Informasi Penggunaan
            </span>
            <h1 class="font-black text-3xl md:text-4xl text-slate-800 leading-tight tracking-tight">
                Panduan Peminjaman
            </h1>
            <p class="text-slate-600 text-xs md:text-sm mt-2 font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-orange-500"></i>
                Syarat dan Ketentuan Booking Ruangan FIK UPNVJ
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mt-12 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">
            
            <!-- Left Card: Syarat Peminjaman -->
            <div class="bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] flex flex-col justify-between h-full hover:border-orange-200/50 transition duration-300">
                <div>
                    <h2 class="text-slate-800 text-xl font-extrabold border-b border-slate-100 pb-4 flex items-center">
                        <span class="w-2.5 h-6 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25 text-orange-600"></span>
                        Syarat Peminjaman
                    </h2>
                    
                    <div class="mt-6 space-y-5 text-xs md:text-sm text-slate-600 font-semibold">
                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center shrink-0 text-orange-650">
                                <i class="fa-solid fa-graduation-cap text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Keluarga Mahasiswa UPNVJ</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Terbuka untuk seluruh civitas akademika dan mahasiswa aktif UPN Veteran Jakarta.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center shrink-0 text-orange-650">
                                <i class="fa-solid fa-laptop-code text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Mahasiswa FIK UPNVJ</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Diutamakan bagi mahasiswa aktif Fakultas Ilmu Komputer.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center shrink-0 text-orange-650">
                                <i class="fa-solid fa-id-card text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Mahasiswa Aktif</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Peminjam wajib terdaftar sebagai mahasiswa aktif pada semester berjalan.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center shrink-0 text-orange-650">
                                <i class="fa-solid fa-sitemap text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Anggota Organisasi / Instansi</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Tercatat sebagai anggota instansi atau perwakilan organisasi resmi FIK UPNVJ.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Card: Ketentuan Peminjaman -->
            <div class="bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] flex flex-col justify-between h-full hover:border-orange-200/50 transition duration-300">
                <div>
                    <h2 class="text-slate-800 text-xl font-extrabold border-b border-slate-100 pb-4 flex items-center">
                        <span class="w-2.5 h-6 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25 text-orange-600"></span>
                        Ketentuan Peminjaman
                    </h2>
                    
                    <div class="mt-6 space-y-5 text-xs md:text-sm text-slate-600 font-semibold">
                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-650">
                                <i class="fa-solid fa-broom text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Menjaga Kebersihan</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Wajib menjaga kebersihan dan kerapian ruangan sebelum, selama, dan sesudah pemakaian.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-650">
                                <i class="fa-solid fa-ban-smoking text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Larangan Keras</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Dilarang merokok, merusak fasilitas, atau membawa barang berbahaya ke dalam lingkungan gedung.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-650">
                                <i class="fa-solid fa-clock text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Kesesuaian Waktu</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Penggunaan ruangan harus sesuai dengan waktu mulai dan selesai yang telah disetujui oleh admin.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 py-1">
                            <span class="w-8 h-8 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-650">
                                <i class="fa-solid fa-shield-halved text-xs"></i>
                            </span>
                            <div>
                                <h4 class="text-slate-800 font-bold text-sm">Tanggung Jawab Kerusakan</h4>
                                <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Kerusakan alat atau fasilitas selama masa peminjaman menjadi tanggung jawab penuh dari penanggung jawab.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection