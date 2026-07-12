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
                Hubungi Kami
            </span>
            <h1 class="font-black text-3xl md:text-4xl text-slate-800 leading-tight tracking-tight">
                Kontak & Lokasi
            </h1>
            <p class="text-slate-600 text-xs md:text-sm mt-2 font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-orange-500"></i>
                Temukan kami di media sosial atau kunjungi lokasi kampus kami.
            </p>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mt-12 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
            
            <!-- Left Side: Social Media Channels -->
            <div class="lg:col-span-5 bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] flex flex-col justify-between hover:border-orange-200/50 transition duration-300">
                <div>
                    <h2 class="text-slate-800 text-xl font-extrabold border-b border-slate-100 pb-4 flex items-center">
                        <span class="w-2.5 h-6 bg-gradient-to-b from-orange-500 to-amber-500 rounded-lg mr-3 shadow-md shadow-orange-500/25 text-orange-600"></span>
                        Saluran Komunikasi
                    </h2>
                    
                    <div class="mt-6 space-y-4">
                        <!-- Instagram -->
                        <a href="https://instagram.com/fikupnvj" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-orange-50/50 border border-slate-100 hover:border-orange-100 transition duration-300 group">
                            <div class="flex items-center gap-3.5">
                                <span class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                                    <i class="fa-brands fa-instagram text-lg"></i>
                                </span>
                                <div>
                                    <h4 class="text-slate-800 font-bold text-sm">Instagram</h4>
                                    <p class="text-slate-500 text-xs mt-0.5">@fikupnvj</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition duration-300 text-xs"></i>
                        </a>

                        <!-- Twitter/X -->
                        <a href="https://x.com/UPNVJ" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-orange-50/50 border border-slate-100 hover:border-orange-100 transition duration-300 group">
                            <div class="flex items-center gap-3.5">
                                <span class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                                    <i class="fa-brands fa-x-twitter text-lg"></i>
                                </span>
                                <div>
                                    <h4 class="text-slate-800 font-bold text-sm">X / Twitter</h4>
                                    <p class="text-slate-500 text-xs mt-0.5">@UPNVJ</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition duration-300 text-xs"></i>
                        </a>

                        <!-- Youtube -->
                        <a href="https://youtube.com/@fikupnvj" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-orange-50/50 border border-slate-100 hover:border-orange-100 transition duration-300 group">
                            <div class="flex items-center gap-3.5">
                                <span class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                                    <i class="fa-brands fa-youtube text-lg"></i>
                                </span>
                                <div>
                                    <h4 class="text-slate-800 font-bold text-sm">YouTube Channel</h4>
                                    <p class="text-slate-500 text-xs mt-0.5">FIK UPNVJ Official</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition duration-300 text-xs"></i>
                        </a>

                        <!-- Website -->
                        <a href="https://new-fik.upnvj.ac.id/" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-orange-50/50 border border-slate-100 hover:border-orange-100 transition duration-300 group">
                            <div class="flex items-center gap-3.5">
                                <span class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                                    <i class="fa-solid fa-earth-americas text-lg"></i>
                                </span>
                                <div>
                                    <h4 class="text-slate-800 font-bold text-sm">Website Resmi</h4>
                                    <p class="text-slate-500 text-xs mt-0.5">new-fik.upnvj.ac.id</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-orange-500 group-hover:translate-x-1 transition duration-300 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Side: Google Maps Location Embed -->
            <div class="lg:col-span-7 bg-white rounded-[32px] border border-slate-100 p-3 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden flex flex-col justify-stretch hover:border-orange-200/50 transition duration-300 min-h-[400px]">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6005846208463!2d106.79238557480404!3d-6.316081993673284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee229acb972d%3A0x2e74d2fa25f612e2!2sFaculty%20of%20Computer%20Science%20-%20Pembangunan%20Nasional%20%22Veteran%22%20Jakarta%20University!5e0!3m2!1sen!2sid!4v1762678948393!5m2!1sen!2sid" 
                    class="w-full h-full min-h-[400px] rounded-2xl border-0" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
    </div>
</div>

@endsection